<?php

namespace App\Repositories;
use App\Models\User;
use App\Utilities\AppHelper;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Hash;

class UserRepository extends BaseRepository
{
	protected $modelName = User::class;

    protected function applySearch(Builder $instance, string $keyword = null): void
    {
        if($keyword){
            $instance->where('name', 'like', '%' . $keyword . '%')
                      ->Orwhere('email', 'like', '%' .$keyword . '%');
        }
    }

    protected function applyFilters(Builder $instance, array $filters = []): void
    {
        $this->applyStatusFilter($instance, $filters);
    }

    /**
     * Filter by status.
     */
    protected function applyStatusFilter(Builder $instance, array $filters = []): void
    {
        if (Arr::get($filters, 'status')) {
            $instance->where('status', Arr::get($filters, 'status'));
        }
    }

    /**
     * @return int
     */
    public function totalUser()
    {
        return User::all()->count();
    }

    /**
     * @param $user_id
     * @return mixed
     */
    public function getUser($user_id)
    {
        return User::find($user_id);
    }

    /**
     * @param $email
     * @return mixed
     */
    public function getUserByEmail($email)
    {
        return User::where('email', $email)->first();
    }

    /**
     * @param $user_id
     * @return mixed
     */
    public function storeUser($data)
    {
        DB::beginTransaction();
        try {
            $user = new User();
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password = Hash::make($data['password']);
            $user->platform = $data['platform'];
            $user->role_id = $data['role_id'];
            $user->save();
            DB::commit();
            return $user;
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }

    /**
     * @param $data
     * @return void
     * @throws \Exception
     */
    public function updateUser($user,$data)
    {
        DB::beginTransaction();
        try {
            if (!$user){
                DB::rollBack();
                throw new \Exception('User not found');
            }
            $user->name = $data['name'];
            $user->platform = $data['platform'];
            $user->role_id = $data['role_id'];
            if (in_array('email',$data) && $data['email'] != $user->email){
                $user->email = $data['email'];
            }
            if (in_array('password',$data) && $data['password'] != '') {
                $user->password = Hash::make($data['password']);
            }
            $user->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    /**
     * @param $user
     * @return void
     * @throws \Exception
     */
    public function destroyUser($user)
    {
        DB::beginTransaction();
        try {
            $user->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
             throw $e;
        }
    }


    /**
     * @param $user
     * @param $status
     * @throws \Exception
     */
    public function statusUpdate($user, $status)
    {
        DB::beginTransaction();
        try {
            $user->status = $status;
            $user->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
             throw $e;
        }
    }




}
