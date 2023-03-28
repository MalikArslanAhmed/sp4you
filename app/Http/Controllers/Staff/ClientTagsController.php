<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyClientTagRequest;
use App\Http\Requests\StoreClientTagRequest;
use App\Http\Requests\UpdateClientTagRequest;
use App\Models\ClientTag;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClientTagsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('client_tag_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clientTags = ClientTag::all();

        return view('staff.clientTags.index', compact('clientTags'));
    }

    public function create()
    {
        abort_if(Gate::denies('client_tag_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('staff.clientTags.create');
    }

    public function store(StoreClientTagRequest $request)
    {
        $clientTag = ClientTag::create($request->all());

        return redirect()->route('staff.client-tags.index');
    }

    public function edit(ClientTag $clientTag)
    {
        abort_if(Gate::denies('client_tag_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('staff.clientTags.edit', compact('clientTag'));
    }

    public function update(UpdateClientTagRequest $request, ClientTag $clientTag)
    {
        $clientTag->update($request->all());

        return redirect()->route('staff.client-tags.index');
    }

    public function show(ClientTag $clientTag)
    {
        abort_if(Gate::denies('client_tag_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('staff.clientTags.show', compact('clientTag'));
    }

    public function destroy(ClientTag $clientTag)
    {
        abort_if(Gate::denies('client_tag_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clientTag->delete();

        return back();
    }

    public function massDestroy(MassDestroyClientTagRequest $request)
    {
        ClientTag::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
