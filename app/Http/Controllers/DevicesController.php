<?php

namespace App\Http\Controllers;

use App\Repositories\DeviceRepository;
use Illuminate\Http\Request;

class DevicesController extends Controller
{
    private $deviceRepository;
    public function __construct(DeviceRepository $deviceRepository)
    {
        $this->deviceRepository = $deviceRepository;
    }

    /*
     * views
     */
    public function indexView()
    {
        $devices = $this->deviceRepository->all();
        return view('devices.list');
    }

    public function createView()
    {
        return View('devices.create');
    }

    public function editView($deviceId)
    {
        $device = json_encode($this->deviceRepository->findById($deviceId));
        return View('devices.edit',compact('device'));
    }

    public function index()
    {
        return $this->deviceRepository->all();
    }

    public function create(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'description' => 'required|max:500',
        ]);

        $this->deviceRepository->create($validatedData);
    }

    public function update(Request $request, $deviceId)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'description' => 'required|max:500',
        ]);
        return $this->deviceRepository->update($deviceId,$request->all());
    }

    public function delete($deviceId)
    {
        return $this->deviceRepository->delete($deviceId);
    }
}
