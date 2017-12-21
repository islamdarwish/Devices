<?php

namespace Tests\Feature;

use App\Models\Device;
use App\Repositories\DeviceRepository;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DeviceRepositoryTest extends TestCase
{

    use RefreshDatabase;
    protected $devicesRepository;

    public function setUp()
    {
        parent::setUp();
        $this->devicesRepository = $this->app->make(DeviceRepository::class);
    }
    
    public function test_create_a_device()
    {
        $device = $this->devicesRepository->create([
            "name" => "Device Name",
            "description" => "Description"
        ]);

        $this->assertDatabaseHas('devices', [
            "id" => $device->id
        ]);

    }

    public function test_delete_a_device()
    {
        $device = factory(Device::class)->create([
            "name" => "Device Name",
            "description" => "Description"
        ]);

        $this->devicesRepository->delete($device->id);
        $this->assertDatabaseMissing('devices',[
            "id" => $device->id
        ]);
    }

    public function test_update_a_device()
    {
        $device = factory(Device::class)->create([
            "name" => "specificDevice",
            "description" => "Description"
        ]);

        $this->devicesRepository->update($device->id,[
            "name" => "specificDevice1",
            "description" => "specificDeviceDescription1"
        ]);

        $this->assertDatabaseHas('devices',[
            "id" => $device->id,
            "name" => "specificDevice1",
            "description" => "specificDeviceDescription1"
        ]);
    }


}
