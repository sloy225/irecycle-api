<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Exception;
use Throwable;

/**
 * @method static paginate(int $int)
 * @method static findOrFail(mixed $input)
 * @property mixed $last_name
 * @property mixed $first_name
 * @property mixed $email
 * @property mixed $contact
 * @property mixed $location
 * @property mixed|string $password
 */

class Client extends Model
{
    use HasFactory, softDeletes;

    private function success($status = false, $object = []): array
    {
        return [
            'status' => $status,
            'object' => $object,
        ];
    }

    private function error($status = false,  $error = null): array
    {
        return [
            'status' => $status,
            'error' => $error
        ];
    }



    public function getAllClient(): array
    {
        try {
            return $this->success(true, Client::all());
        }catch (Exception $e){
            return $this->error(false, $e);
        }
    }

    public function getClientById($id): array
    {
        try {
            $client = Client::findOrFail($id);
            return $client ? $this->success(true, $client) : $this->error(false, $client);
        }catch (Exception $e){
            return $this->error(false, $e);
        }
    }

    public function createClient(Request $request): array
    {
        try {
            $validator = Validator::make($request->all(), [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|unique:clients,email',
                'contact' => 'required|unique:clients,contact',
                'location' => 'required',
                'password' => 'required',
            ]);
            if (!$validator->fails()){
                $client = new Client();
                $client->password = Hash::make($request->input('email'));
                $client = $this->extend($client, $request);
                return $this->success(true, $client);
            }
            return $this->error(false, $validator->failed());
        }catch (Exception $e){
            return $this->error(false, $e);
        }
    }

    public function updateClientDetails(Request $request): array{
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required',
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|unique:clients,email',
                'contact' => 'required|unique:clients,contact',
                'location' => 'required'
            ]);
            if (!$validator->fails()){
                $client = Client::findOrFail($request->input('id'));
                if ($client){
                    $client = $this->extend($client, $request);
                    return $this->success(true, $client);
                }else{
                    $result = $client;
                }
            }
            return $this->error(false, $result ?? $validator->failed());
        }catch (Exception $e){
            return $this->error(false, $e);
        }
    }

    /**
     * @throws Throwable
     */
    public function deleteClient($id): array {
        try {
            $client = Client::query()->find($id)->deleteOrFail();
            return $client ? $this->success(true) : $this->error(false, $client);
        }catch (Exception $e){
            return $this->error(false, $e);
        }
    }

    public function extend (Client $client, Request $request): Client
    {
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $contact = $request->input('contact');
        $email = $request->input('email');
        $location = $request->input('location');
        $client->first_name = $first_name;
        $client->last_name = $last_name;
        $client->email = $email;
        $client->contact = $contact;
        $client->location = $location;
        $client->save();
        return $client;
    }
}
