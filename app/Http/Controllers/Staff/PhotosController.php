<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPhotoRequest;
use App\Http\Requests\StorePhotoRequest;
use App\Http\Requests\UpdatePhotoRequest;
use App\Models\Appointment;
use App\Models\CrmCustomer;
use App\Models\Photo;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class PhotosController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('photo_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $photos = Photo::with(['client', 'appointment', 'media'])->get();

        return view('staff.photos.index', compact('photos'));
    }

    public function create()
    {
        abort_if(Gate::denies('photo_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients = CrmCustomer::pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $appointments = Appointment::pluck('address', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('staff.photos.create', compact('appointments', 'clients'));
    }

    public function store(StorePhotoRequest $request)
    {
        $photo = Photo::create($request->all());

        foreach ($request->input('photo', []) as $file) {
            $photo->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $photo->id]);
        }

        return redirect()->route('staff.photos.index');
    }

    public function edit(Photo $photo)
    {
        abort_if(Gate::denies('photo_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients = CrmCustomer::pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $appointments = Appointment::pluck('address', 'id')->prepend(trans('global.pleaseSelect'), '');

        $photo->load('client', 'appointment');

        return view('staff.photos.edit', compact('appointments', 'clients', 'photo'));
    }

    public function update(UpdatePhotoRequest $request, Photo $photo)
    {
        $photo->update($request->all());

        if (count($photo->photo) > 0) {
            foreach ($photo->photo as $media) {
                if (!in_array($media->file_name, $request->input('photo', []))) {
                    $media->delete();
                }
            }
        }
        $media = $photo->photo->pluck('file_name')->toArray();
        foreach ($request->input('photo', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $photo->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('photo');
            }
        }

        return redirect()->route('staff.photos.index');
    }

    public function show(Photo $photo)
    {
        abort_if(Gate::denies('photo_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $photo->load('client', 'appointment');

        return view('staff.photos.show', compact('photo'));
    }

    public function destroy(Photo $photo)
    {
        abort_if(Gate::denies('photo_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $photo->delete();

        return back();
    }

    public function massDestroy(MassDestroyPhotoRequest $request)
    {
        Photo::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('photo_create') && Gate::denies('photo_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Photo();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
