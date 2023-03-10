<?php

namespace App\Models;

use App\Helpers\ImageHelper;
use App\Models\Withdraw;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','email', 'password','status','left_refferal','phone','refferral_link',
        'right_refferal','left_amount','right_amount','balance','r_earning','refer_type',
        'refer_by','package_id', 'a_date','image','top_referral','auto_wallet','reward_income'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'a_date' => 'date',
    ];
    public function setPasswordAttribute($value){
        if (!empty($value)){
            $this->attributes['password'] = Hash::make($value);
        }
    }
    public function setImageAttribute($value){
        $this->attributes['image'] = ImageHelper::saveAImage($value,'/profile/');
    }
    public function refers()
    {
        return $this->hasMany('App\Models\User','refer_by')->where('status','active');
    }
    public function active_refer()
    {
        return User::where('refer_by',$this->id)->where('status','active')->get();
    }
    public function pending_refer()
    {
        return User::where('refer_by',$this->id)->where('status','pending')->get();
    }
    public function all_refer()
    {
        return User::where('refer_by',$this->id)->get();
    }
    public static function status(){
        return (new static)::where('status','active')->get();
    }
    public function package()
    {
        return $this->belongsTo('App\Models\Package');
    }
    public static function active(){
        return (new static)::where('status','active')->get();
    } 
    public static function pending(){
        return (new static)::where('status','pending')->get();
    }
    
    public function withdraws()
    {
        return $this->hasMany(Withdraw::class);
    }

    public function deposits()
    {
        return $this->hasMany(Deposit::class);
    }
    public function totalEarning()
    {
        return $this->hasMany(Earning::class)->sum('price');
    }
    
    public function totalWithdraw()
    {
        return $this->hasMany(Withdraw::class)->sum('payment');
    }
    public function packageExpires()
    {
        return $this->a_date->addDays($this->package->package_validity);
    }
    public function referralEarning()
    {
        return $this->refers->count() * $this->package->r_earning;
    }
    public function todayreferralEarning()
    {
        return $this->refers()->count() * (($this->package->click/100)*($this->package->day)/$this->package->ads);
    }

    public function checkStatus(){
        if(!$this->a_date){
            return 'fresh';

        }else {
            return 'old';
        }
    }
    public function withdrawLimit(){
   
        $total_withdraw = Withdraw::where('user_id',$this->id)->where('status','Completed')->whereBetween('created_at',[$this->a_date,Carbon::tomorrow()])->sum('payment');
        return $total_withdraw;
    }
    public function withdrawPending(){
   
        $total_withdraw = Withdraw::where('user_id',$this->id)->where('status','in process')->whereBetween('created_at',[$this->a_date,Carbon::tomorrow()])->sum('payment');
        return $total_withdraw;
    }
    public function checkWithdrawStatus(){
        if($this->package)
        {
            $limit = $this->package->withdraw_limit;
            $total_withdraw = $this->withdrawLimit();
            $pending_withdraw = $this->withdrawPending();
            $total_withdraw = $total_withdraw + $pending_withdraw;
            if($total_withdraw > $limit)
            {
                return true;
            }
        }
        return false;
    }
	public function mrefers()
    {
        return $this->hasMany('App\Models\User','refer_by');
    }
	public function refer_by_name($id)
    {
        $user = User::find($id);
        if($user)
        {
            return $user->name;
        }else{
            return '';

        }
    }
	public function placement()
    {
        $user = User::where('left_refferal',$this->id)->orWhere('right_refferal',$this->id)->first();
        if($user)
        {
            return $user->name;
        }
        return '';
        
    }
    public function refer_by_user($id)
    {
        $user = User::find($id);
        return $user;
    }
    public function earnings()
    {
        return $this->hasMany(Earning::class,'user_id');
    }
    public function getOrginalLeft()
    {
        $all_left = [];
        $left = User::find($this->left_refferal);
        if($left)
        {
            $all_left[] = $left;
            for($i = 0; $i < 100; $i++)
            {
                if($left->left_refferal == null)
                {
                    $i = 100;
                }else{
                    $left = User::find($left->left_refferal);
                    $all_left[] = $left;
                }
                
            } 
        }
        
        return $all_left;
    }
    public function getOrginalUpperLeft()
    {
        $all_left = [];
        $left = User::where('left_refferal',$this->id)->orWhere('right_refferal',$this->id)->first();
        if($left)
        {
            $all_left[] = $left;
            for($i = 0; $i < 100; $i++)
            {
                $left = User::where('left_refferal',$left->id)->orWhere('right_refferal',$left->id)->first();
                $all_left[] = $left;
            } 
        }
        return $all_left;
    }
    public function getOrginalUpperRight()
    {
        $all_right = [];
        $right = User::where('right_refferal',$this->id)->orWhere('left_refferal',$this->id)->first();
        if($right)
        {
            $all_right[] = $right;
            for($i = 0; $i < 100; $i++)
            {
                $right = User::where('right_refferal',$right->id)->orWhere('left_refferal',$right->id)->first();
                $all_right[] = $right;
            } 
        }
        return $all_right;
    }
    public function getOrginalRight()
    {
        $all_right = [];
        $right = User::find($this->right_refferal);
        if($right)
        {
            $all_right[] = $right;
            for($i = 0; $i < 100; $i++)
            {
                if($right->right_refferal == null)
                {
                    $i = 100;
                }else{
                    $right = User::find($right->right_refferal);
                    $all_right[] = $right;
                }    
            } 
        }
        return $all_right;
    }
    
    public function getRightPrice()
    {
        $price = 0;
        $rights =  $this->getOrginalRight();
        foreach($rights as $right)
        {
            $price = $price + $right->right_amount;
        }
        return $price;
    }
    public function getLeftPrice()
    {
        $price = 0;
        $lefts =  $this->getOrginalLeft();
        foreach($lefts as $left)
        {
            $price = $price + $left->left_amount;
        }
        return $price;
    }
    public function ManageMatchingEarning()
    {
        $price = 0;
        $lefts =  $this->getOrginalLeft();
        foreach($lefts as $left)
        {
            $price = $price + $left->left_amount;
        }
        return $price;
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function matchingEarning($id,$matching_income)
    {
        if($this->left_refferal == $id)
        {
            $this->update([
                'left_amount' =>   $this->left_amount + $matching_income,
            ]);
        }else{
            $this->update([
                'right_amount' =>   $this->right_amount + $matching_income,
            ]);
        }
    }
    public function orderStatus($price)
    {
        $product_cost = $price;
        $order_price = $this->orders()->sum('price');
        $amount = $this->package->price - $order_price;
        if($amount >= $product_cost && $this->balance >= 150)
        {
            return true;
        }else{
            return false;
        }
    }
    public function remainingProductPrice()
    {
        $day = Carbon::parse(date('Y-m-d', strtotime("-30 days")));
        if($this->created_at->lt($day) && $this->orders()->count() == 0)
        {
            return 0;
        }
        $order_price = $this->orders()->sum('price');
        $amount = $this->package->price - $order_price;
        return $amount;
    }
    public function incomeLimit(){
   
        if($this->a_date)
        {
            $income_limit = Earning::where('user_id',$this->id)->whereBetween('created_at',[$this->a_date,Carbon::tomorrow()])->sum('price');
            if($income_limit >= $this->package->income_limit)
            {
                return false;
            }
            return true;
        }else{
            return true;
        }
        
    }
    public function level_1()
    {
        $users = [];
        if($this->left_refferal)
            $users[] = $this->left_refferal;
        if($this->right_refferal)
            $users[] = $this->right_refferal;
        return $users;
    }
    public function level_2()
    {
        $old_users = User::whereIn('id',$this->level_1())->get();
        $users = [];
        foreach($old_users as $old_user)
        {
            if($old_user->left_refferal)
                $users[] = $old_user->left_refferal;
            if($old_user->right_refferal)
                $users[] = $old_user->right_refferal;
        }
        return $users;
    }
    public function level_3()
    {
        $old_users = User::whereIn('id',$this->level_2())->get();
        $users = [];
        foreach($old_users as $old_user)
        {
            if($old_user->left_refferal)
                $users[] = $old_user->left_refferal;
            if($old_user->right_refferal)
                $users[] = $old_user->right_refferal;
        }
        return $users;
    }
    public function level_4()
    {
        $old_users = User::whereIn('id',$this->level_3())->get();
        $users = [];
        foreach($old_users as $old_user)
        {
            if($old_user->left_refferal)
                $users[] = $old_user->left_refferal;
            if($old_user->right_refferal)
                $users[] = $old_user->right_refferal;
        }
        return $users;
    }
    public function level_5()
    {
        $old_users = User::whereIn('id',$this->level_4())->get();
        $users = [];
        foreach($old_users as $old_user)
        {
            if($old_user->left_refferal)
                $users[] = $old_user->left_refferal;
            if($old_user->right_refferal)
                $users[] = $old_user->right_refferal;
        }
        return $users;
    }
    public function level_6()
    {
        $old_users = User::whereIn('id',$this->level_5())->get();
        $users = [];
        foreach($old_users as $old_user)
        {
            if($old_user->left_refferal)
                $users[] = $old_user->left_refferal;
            if($old_user->right_refferal)
                $users[] = $old_user->right_refferal;
        }
        return $users;
    }
    public function level_7()
    {
        $old_users = User::whereIn('id',$this->level_6())->get();
        $users = [];
        foreach($old_users as $old_user)
        {
            if($old_user->left_refferal)
                $users[] = $old_user->left_refferal;
            if($old_user->right_refferal)
                $users[] = $old_user->right_refferal;
        }
        return $users;
    }
    public function level_8()
    {
        $old_users = User::whereIn('id',$this->level_7())->get();
        $users = [];
        foreach($old_users as $old_user)
        {
            if($old_user->left_refferal)
                $users[] = $old_user->left_refferal;
            if($old_user->right_refferal)
                $users[] = $old_user->right_refferal;
        }
        return $users;
    }
    public function level_9()
    {
        $old_users = User::whereIn('id',$this->level_8())->get();
        $users = [];
        foreach($old_users as $old_user)
        {
            if($old_user->left_refferal)
                $users[] = $old_user->left_refferal;
            if($old_user->right_refferal)
                $users[] = $old_user->right_refferal;
        }
        return $users;
    }
    public function level_10()
    {
        $old_users = User::whereIn('id',$this->level_9())->get();
        $users = [];
        foreach($old_users as $old_user)
        {
            if($old_user->left_refferal)
                $users[] = $old_user->left_refferal;
            if($old_user->right_refferal)
                $users[] = $old_user->right_refferal;
        }
        return $users;
    }
    public function level_11()
    {
        $old_users = User::whereIn('id',$this->level_10())->get();
        $users = [];
        foreach($old_users as $old_user)
        {
            if($old_user->left_refferal)
                $users[] = $old_user->left_refferal;
            if($old_user->right_refferal)
                $users[] = $old_user->right_refferal;
        }
        return $users;
    }
    public function level_12()
    {
        $old_users = User::whereIn('id',$this->level_11())->get();
        $users = [];
        foreach($old_users as $old_user)
        {
            if($old_user->left_refferal)
                $users[] = $old_user->left_refferal;
            if($old_user->right_refferal)
                $users[] = $old_user->right_refferal;
        }
        return $users;
    }
    public function level_13()
    {
        $old_users = User::whereIn('id',$this->level_12())->get();
        $users = [];
        foreach($old_users as $old_user)
        {
            if($old_user->left_refferal)
                $users[] = $old_user->left_refferal;
            if($old_user->right_refferal)
                $users[] = $old_user->right_refferal;
        }
        return $users;
    }
    public function level_14()
    {
        $old_users = User::whereIn('id',$this->level_13())->get();
        $users = [];
        foreach($old_users as $old_user)
        {
            if($old_user->left_refferal)
                $users[] = $old_user->left_refferal;
            if($old_user->right_refferal)
                $users[] = $old_user->right_refferal;
        }
        return $users;
    }
    public function notInTree()
    {
        $user = User::where('left_refferal',$this->id)->orWhere('right_refferal',$this->id)->first();
        if($user)
            return false;
        else
            return true;
    }
}
