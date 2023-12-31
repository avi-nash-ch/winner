<?php

class Users_model extends MY_Model
{
    public function AllDeleveryBoys()
    {
        $this->db->select('tbl_worker.*');
        $this->db->from('tbl_worker');
        $this->db->where('tbl_worker.isDeleted', false);
        $this->db->where('tbl_worker.role', 0);
        $this->db->where('tbl_worker.status', 1);
        $this->db->order_by('tbl_worker.id', 'asc');
        // $this->db->limit(10);
        $Query = $this->db->get();
        return $Query->result();
    }

    public function getAllFcm($type)
    {
        $this->db->select('GROUP_CONCAT(tbl_worker.fcm SEPARATOR ",") as fcm_str');
        $this->db->from('tbl_worker');
        $this->db->where('tbl_worker.isDeleted', false);
        $this->db->where('tbl_worker.role', 0);
        $this->db->where('tbl_worker.status', 1);
        $this->db->where('tbl_worker.delivery_boy_type',$type);
        $this->db->where('tbl_worker.fcm!=','');
        $this->db->order_by('tbl_worker.id', 'asc');
        // $this->db->limit(10);
        $Query = $this->db->get();
        return $Query->result();
    }

    public function getTodaysOrder($user_id,$type,$date)
    {
        $date=date('Y-m-d',strtotime($date));
        $this->db->select('product_orders.*,tbl_worker.name as delivery_boy,tbl_worker.lat as del_boy_lat,tbl_worker.lng as del_boy_long,shop.name as shop_name,shop.image2 as qr_image,shop.lat as shop_lat,shop.lng as shop_long,(select sum(delivery_charges) from product_orders where date(added_date)="'.$date.'" and shop_id="'.$user_id.'") as total,(select sum(delivery_boy_charges) from product_orders where date(added_date)="'.$date.'" and user_id="'.$user_id.'") as delivery_boy_total');
        $this->db->from('product_orders');
        $this->db->join('tbl_worker shop', 'shop.shop_id=product_orders.shop_id');
        $this->db->join('tbl_worker', 'tbl_worker.id=product_orders.user_id','left');
        $this->db->where('product_orders.isDeleted', false);
        if($type==1){
            $this->db->where('product_orders.shop_id', $user_id);
        }else{
            $this->db->where('product_orders.user_id', $user_id);
        }
        $this->db->where('DATE(product_orders.added_date)',$date);
        // $this->db->order_by('product_orders.id', 'desc');
        $this->db->order_by('product_orders.status', 'asc');
        // $this->db->limit(10);
        $Query = $this->db->get();
        return $Query->result();
    }
    public function getPriceSetting()
    {
        $Query = $this->db->get('tbl_price_setting');
        return $Query->row();
    }


    public function WelcomeBonus($id = '')
    {
        if (!empty($id)) {
            $this->db->where('id', $id);
        }
        $Query = $this->db->get('tbl_welcome_reward');
        return $Query->result();
    }

    public function WelcomeBonusLog($user_id)
    {
        $this->db->select('*,DATE(added_date) as date');
        $this->db->where('user_id', $user_id);
        $this->db->order_by('id', 'desc');
        $Query = $this->db->get('tbl_welcome_log');
        return $Query->result();
    }

    public function AddWelcomeBonus($amount, $user_id)
    {
        $this->db->set('wallet', 'wallet+' . $amount, false);
        $this->db->set('updated_date', date('Y-m-d H:i:s'));
        $this->db->where('id', $user_id);
        $this->db->update('user');

        $data = [
            'user_id' => $user_id,
            'coin' => $amount,
            'added_date' => date('Y-m-d H:i:s')
        ];
        $this->db->insert('tbl_welcome_log', $data);
        return $this->db->insert_id();
    }

    public function UpdateWelcomeBonus($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_welcome_reward', $data);
        return $this->db->affected_rows();
    }

    public function FreeUserList()
    {
        $this->db->select('user.*');
        $this->db->from('user');
        $this->db->where('user.isDeleted', false);
        $this->db->where('user.table_id', false);
        $this->db->order_by('user.id', 'desc');
        $Query = $this->db->get();
        return $Query->result();
    }

    public function AllRedeemList()
    {
        $this->db->select('tbl_redeem.*,user.name');
        $this->db->from('tbl_redeem');
        $this->db->join('user', 'user.id=tbl_redeem.user_id');
        $this->db->where('user.isDeleted', false);
        $this->db->order_by('tbl_redeem.id', 'desc');
        $Query = $this->db->get();
        return $Query->result();
    }

    public function RedeemList($user_id)
    {
        $this->db->select('id,amount,payment_method,status,reason,added_date');
        $this->db->from('tbl_redeem');
        $this->db->where('isDeleted', false);
        $this->db->where('user_id', $user_id);
        $this->db->order_by('id', 'desc');
        $Query = $this->db->get();
        return $Query->result();
    }

    public function WinningList($user_id)
    {
        $this->db->from('tbl_game_rewards');
        $this->db->where('isDeleted', false);
        $this->db->where('user_id', $user_id);
        $this->db->order_by('id', 'desc');
        $Query = $this->db->get();
        return $Query->result();
    }

    public function TodayUserList()
    {
        $this->db->select('user.*');
        $this->db->from('user');
        $this->db->where('user.isDeleted', false);
        $this->db->where('date(user.created_date)', date("Y-m-d"));
        $Query = $this->db->get();
        return $Query->result();
    }

    public function InsertOTP($MobileNo, $OTP)
    {
        $this->db->where('mobile', $MobileNo);
        $this->db->where('isVerified',0);
        $Query = $this->db->get('tbl_otp');
        $OTPRecord = $Query->row();
        if ($OTPRecord) {
            //update otp
            $data = [
                'otp' => $OTP,
                'added_date' => date('Y-m-d H:i:s')
            ];
            $this->db->where('id', $OTPRecord->id);
            if ($this->db->update('tbl_otp', $data)) {
                return $OTPRecord->id;
            } else {
                return false;
            }
        } else {
            //insert otp
            $data = [
                'otp' => $OTP,
                'mobile' => $MobileNo
            ];
            if ($this->db->insert('tbl_otp', $data)) {
                return $this->db->insert_id();
            } else {
                return false;
            }
        }
    }

    public function OTPConfirm($Id, $OTP, $MobileNo)
    {
        $this->db->where('id', $Id);
        $this->db->where('otp', $OTP);
        $this->db->where('mobile', $MobileNo);
        $Query = $this->db->get('tbl_otp');
        return $Query->row();
    }

    public function TokenConfirm($user_id, $token)
    {
        $this->db->where('id', $user_id);
        $this->db->where('token', $token);
        $this->db->where('status', 0);
        $this->db->where('isDeleted', 0);
        $Query = $this->db->get('user');
        return $Query->row();
    }

    public function UserByMobile($MobileNo)
    {
        $this->db->where('isDeleted', false);
        $this->db->where('mobile', $MobileNo);
        $Query = $this->db->get('user');
        return $Query->row();
    }

    public function UpdateUser($UserId, $fcm)
    {
        $data = [
            'fcm' => $fcm
        ];
        $this->db->where('id', $UserId);
        $this->db->update('user', $data);
        return $this->db->affected_rows();
    }

    public function Delete($UserId)
    {
        $data = [
            'isDeleted' => 1
        ];
        $this->db->where('id', $UserId);
        $this->db->update('user', $data);
        return $this->db->affected_rows();
    }

    public function UpdateAppVersion($UserId, $app_version)
    {
        $data = [
            'app_version' => $app_version
        ];
        $this->db->where('id', $UserId);
        $this->db->update('user', $data);
        return $this->db->affected_rows();
    }

    public function UpdateToken($UserId, $token)
    {
        $data = [
            'token' => $token
        ];
        $this->db->where('id', $UserId);
        $this->db->update('user', $data);
        return $this->db->affected_rows();
    }

    public function UpdateUserWallet($data, $UserId)
    {
        $this->db->where('id', $UserId);
        $this->db->update('user', $data);
        return $this->db->affected_rows();
    }

    public function AddBot($data)
    {
        $this->db->insert('user', $data);
        return $this->db->insert_id();
    }

    public function getAdhar($user)
    {
        $this->db->select('*');
        $this->db->where('id', $user);
        $this->db->order_by('id', 'desc');
        $Query = $this->db->get('user');
        return $Query->row()->adhar_card;
    }

   
    public function Update($UserId, $data)
    {
        $this->db->where('id', $UserId);
        $this->db->update('user', $data);
        return $this->db->affected_rows();
    }

    public function ChangeStatus($id, $status)
    {
        $data = [
            'status' => $status
        ];
        $this->db->where('id', $id);
        $this->db->update('user', $data);

        return $this->db->affected_rows();
    }

    // public function RegisterUser($MobileNo, $Name, $profile_pic, $gender = 'm', $token, $password, $bonus_amount)
    // {
    //     if (empty($profile_pic)) {
    //         $profile_pic = ($gender == 'f') ? 'f_' . rand(1, 3) . '.png' : 'm_' . rand(1, 10) . '.png';
    //     }
    //     if (!$bonus_amount) {
    //         $bonus_amount = 25000;
    //     }

    //     $data = [
    //         'mobile' => $MobileNo,
    //         'name' => $Name,
    //         'gender' => $gender,
    //         'profile_pic' => $profile_pic,
    //         'token' => $token,
    //         'password' => $password,
    //         'wallet' => $bonus_amount,
    //         'added_date' => date('Y-m-d H:i:s')
    //     ];
    //     $this->db->insert('user', $data);
    //     $UserId =  $this->db->insert_id();

    //     return $UserId;
    // }

    // public function RegisterUserEmail($Email, $Name, $source, $profile_pic, $gender = 'm', $token)
    // {
    //     if (empty($profile_pic)) {
    //         $profile_pic = ($gender == 'f') ? 'f_' . rand(1, 3) . '.png' : 'm_' . rand(1, 10) . '.png';
    //     }

    //     $data = [
    //         'email' => $Email,
    //         'name' => $Name,
    //         'source' => $source,
    //         'gender' => $gender,
    //         'profile_pic' => $profile_pic,
    //         'token' => $token,
    //         'added_date' => date('Y-m-d H:i:s')
    //     ];
    //     $this->db->insert('user', $data);
    //     $UserId =  $this->db->insert_id();

    //     return $UserId;
    // }

    public function AddRedeem($data)
    {
        $this->db->insert('tbl_redeem', $data);
        $ReedemId =  $this->db->insert_id();

        $this->db->set('wallet', 'wallet-' . $data['amount'], false);
        $this->db->set('updated_date', date('Y-m-d H:i:s'));
        $this->db->where('id', $data['user_id']);
        $this->db->update('user');

        $this->db->set('winning_wallet', 'winning_wallet-' . $amount, false);
        $this->db->where('id', $user_id);
        $this->db->where('winning_wallet>', 0);
        $this->db->update('user');

        return $ReedemId;
    }

    public function UpdateWallet($referer_id, $amount, $user_id)
    {
        $this->db->set('referred_by', $referer_id);
        $this->db->set('updated_date', date('Y-m-d H:i:s'));
        $this->db->where('id', $user_id);
        $this->db->update('user');

        $this->db->set('wallet', 'wallet+' . $amount, false);
        $this->db->set('updated_date', date('Y-m-d H:i:s'));
        $this->db->where('id', $referer_id);
        $this->db->update('user');

        return true;
    }

    public function UpdateWalletOrder($amount, $user_id)
    {
        $this->db->set('wallet', 'wallet+' . $amount, false);
        $this->db->set('winning_wallet', 'winning_wallet+' . $amount, false);
        $this->db->set('updated_date', date('Y-m-d H:i:s'));
        $this->db->where('id', $user_id);
        $this->db->update('user');

        return true;
    }

    public function UpdateWalletSpin($user_id, $coin)
    {
        $this->db->set('wallet', 'wallet+' . $coin, false);
        $this->db->set('spin_remaining', 'spin_remaining-1', false);
        $this->db->set('updated_date', date('Y-m-d H:i:s'));
        $this->db->where('id', $user_id);
        $this->db->update('user');

        return true;
    }

    public function UpdateSpin($user_id, $spin_count,$user_category_id)
    {
        $this->db->set('spin_remaining', 'spin_remaining+' . $spin_count, false);
        $this->db->set('updated_date', date('Y-m-d H:i:s'));
        $this->db->set('user_category_id', $user_category_id);
        $this->db->where('id', $user_id);
        $this->db->update('user');

        return true;
    }

    public function WalletLog($amount, $bonus, $user_id)
    {
        $data = [
            'user_id' => $user_id,
            'bonus' => $bonus,
            'coin' => $amount,
            'added_date' => date('Y-m-d H:i:s')
        ];
        $this->db->insert('tbl_wallet_log', $data);
        return $this->db->insert_id();
    }

    public function View_WalletLog($user_id)
    {
        $this->db->where('user_id', $user_id);
        $Query = $this->db->get('tbl_wallet_log');
        return $Query->result();
    }

    public function TipAdmin($amount, $user_id, $table_id, $gift_id, $to_user_id)
    {
        $this->db->set('wallet', 'wallet-' . $amount, false);
        $this->db->set('updated_date', date('Y-m-d H:i:s'));
        $this->db->where('id', $user_id);
        $this->db->update('user');

        $this->db->set('winning_wallet', 'winning_wallet-' . $amount, false);
        $this->db->where('id', $user_id);
        $this->db->where('winning_wallet>', 0);
        $this->db->update('user');

        $this->db->set('admin_coin', 'admin_coin+' . $amount, false);
        $this->db->set('updated_date', date('Y-m-d H:i:s'));
        $this->db->update('tbl_admin');

        $data = [
            'user_id' => $user_id,
            'to_user_id' => $to_user_id,
            'gift_id' => $gift_id,
            'table_id' => $table_id,
            'coin' => $amount,
            'added_date' => date('Y-m-d H:i:s')
        ];
        $this->db->insert('tbl_tip_log', $data);
        return $this->db->insert_id();
    }

    public function GiftList($table_id)
    {
        $curr = date('Y-m-d H:i:s');
        $last_min = date('Y-m-d H:i:s', strtotime('-30 seconds'));

        $this->db->select('tbl_tip_log.*,tbl_gift.image');
        $this->db->where('gift_id!=', 0);
        $this->db->where('table_id', $table_id);
        $this->db->where('tbl_tip_log.added_date >=', $last_min);
        $this->db->where('tbl_tip_log.added_date <=', $curr);
        $Query = $this->db->join('tbl_gift', 'tbl_gift.id=tbl_tip_log.gift_id');
        $Query = $this->db->get('tbl_tip_log');
        // echo $this->db->last_query();
        return $Query->result();
    }

    public function UpdateReferralCode($user_id, $referralId)
    {
        if (!$referralId) {
            $referralId = 'TEENPATTI';
        }
        $this->db->set('referral_code', $referralId . $user_id);
        $this->db->set('updated_date', date('Y-m-d H:i:s'));
        $this->db->where('id', $user_id);
        $this->db->update('user');
    }

    public function LoginUser($MobileNo)
    {
        $this->db->where('phone', $MobileNo);
        // $this->db->where('password', $Password);
        $user = $this->db->get('user');
        return $user->result();
    }

    public function UserProfile($id)
    {
        $this->db->select('tbl_worker.*');
        $this->db->from('tbl_worker');
        $this->db->where('isDeleted', false);
        $this->db->where('tbl_worker.id', $id);
        $Query = $this->db->get();
        return $Query->result();
    }

    public function orderByUserId($user_id)
    {
        $this->db->select('*');
        $this->db->from('product_orders');
        $this->db->where('isDeleted', false);
        $this->db->where('customer_id', $user_id);
        $Query = $this->db->get();
        return $Query->result();
    }
    public function getOrderStatus($id)
    {
        $this->db->select('status');
        $this->db->from('product_orders');
        $this->db->where('isDeleted', false);
        $this->db->where('id', $id);
        $Query = $this->db->get();
        return $Query->row();
    }

    public function UserCheck($mobile)
    {
        $this->db->select('id');
        $this->db->from('tbl_worker');
        $this->db->where('isDeleted', false);
        $this->db->where('whatsapp_no', $mobile);
        $Query = $this->db->get();
        return $Query->row();
    }

    public function Registration($data)
    {
        $this->db->insert('tbl_worker', $data);
        return $this->db->insert_id();
    }

    public function AddWelcomeReferLog($data)
    {
        $this->db->insert('tbl_welcome_ref', $data);
        return $this->db->insert_id();
    }

    public function GetFreeBot()
    {
        $this->db->from('user');
        $this->db->where('isDeleted', false);
        $this->db->where('status', false);
        $this->db->where('table_id', 0);
        $this->db->where('wallet>=', 10000);
        $this->db->where('user_type', 1);

        $Query = $this->db->get();
        // echo $this->db->last_query();
        // die();
        return $Query->result();
    }

    public function GetFreeRummyBot()
    {
        $this->db->from('user');
        $this->db->where('isDeleted', false);
        $this->db->where('status', false);
        $this->db->where('rummy_table_id', 0);
        $this->db->where('wallet>=', 100);
        $this->db->where('user_type', 1);

        $Query = $this->db->get();
        // echo $this->db->last_query();
        // die();
        return $Query->result();
    }

    public function Setting()
    {
        $this->db->from('tbl_admin');
        $this->db->where('isDeleted', false);

        $Query = $this->db->get();
        return $Query->row();
    }

    public function UpdateSetting($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('tbl_admin', $data);
        return $this->db->affected_rows();
    }

    public function UserWallet($user_id)
    {
        $this->db->select('user.wallet');
        $this->db->from('user');
        $this->db->where('isDeleted', false);
        $this->db->where('user.id', $user_id);

        $Query = $this->db->get();
        // echo $this->db->last_query();
        // die();
        return $Query->row();
    }

    public function UserProfileByMobile($MobileNo)
    {
        $this->db->select('user.*');
        $this->db->from('user');
        $this->db->where('isDeleted', false);
        $this->db->where('user.mobile', $MobileNo);

        $Query = $this->db->get();
        // echo $this->db->last_query();
        // die();
        return $Query->result();
    }

    public function orderById($id)
    {
        $this->db->select('product_orders.*,shop.name as shop_name,shop.image2 as qr_image');
        $this->db->from('product_orders');
        $this->db->join('tbl_worker shop', 'shop.shop_id=product_orders.shop_id');
        $this->db->where('product_orders.isDeleted', false);
        $this->db->where('product_orders.id', $id);
        $Query = $this->db->get();
        return $Query->result();
    }

    public function UserProfileByEmail($Email)
    {
        $this->db->select('user.*');
        $this->db->from('user');
        $this->db->where('isDeleted', false);
        $this->db->where('user.email', $Email);

        $Query = $this->db->get();
        // echo $this->db->last_query();
        // die();
        return $Query->result();
    }

    public function fcmUpdate($id,$fcm)
    {
        $data = [
            'fcm'=>$fcm,
        ];
        $this->db->where('id', $id);
        $this->db->update('tbl_worker', $data);
        return $this->db->last_query();
    }
    public function acceptStatus($user_id,$order_id,$status,$payment_mode,$collect_price,$trans_pic,$reason)
    {
        $data = [
            'status'=>$status,
            'user_id'=>$user_id,
            'mode'=>$payment_mode,
            'reason'=>$reason,
            'collect_price'=>$collect_price,
            'transaction_image'=>$trans_pic,
            
        ];
        $this->db->where('id', $order_id);
        $this->db->update('product_orders', $data);
        return $this->db->last_query();
    }
    public function IsValidReferral($referral_code)
    {
        $this->db->select('user.*');
        $this->db->from('user');
        $this->db->where('isDeleted', false);
        $this->db->where('user.referral_code', $referral_code);

        $Query = $this->db->get();
        // echo $this->db->last_query();
        // die();
        return $Query->result();
    }

    public function View_Wins($user_id)
    {
        $Query = $this->db->where('isDeleted', false)
            ->where('winner_id', $user_id)
            ->get('tbl_game');
        return $Query->result();
    }

    public function View_Purchase($user_id)
    {
        $Query = $this->db->where('isDeleted', false)
            ->where('user_id', $user_id)
            ->where('payment', 1)
            ->get('tbl_purchase');
        return $Query->result();
    }

    public function View_AllPurchase($user_id)
    {
        $Query = $this->db->query("SELECT * FROM (
            SELECT `coin`,`price`,`updated_date`, 'ONLINE PURCHASE' as type,`user_id` FROM `tbl_purchase` WHERE `payment`=1
            UNION
            SELECT `coin`,0 as price,`added_date`, IF(`bonus`=1,'BONUS','ADMIN PURCHASE') as type,`user_id` FROM `tbl_wallet_log`
            ) as a WHERE user_id='".$user_id."'ORDER BY updated_date DESC");
        return $Query->result();
    }

    public function View_Reffer($user_id)
    {
        $Query = $this->db->where('isDeleted', false)
            ->where('referred_by', $user_id)
            ->get('user');
        return $Query->result();
    }

    public function Purchase_History()
    {
        $Query = $this->db->select('tbl_purchase.*,user.name')
            ->from('tbl_purchase')
            ->join('user', 'user.id=tbl_purchase.user_id')
            ->where('tbl_purchase.payment', true)
            ->where('tbl_purchase.isDeleted', false)
            ->where('user.isDeleted', false)
            ->get();
        return $Query->result();
    }

    public function View_Purchase_Reffer()
    {
        $Query = $this->db->select('tbl_purcharse_ref.*,user.name')
            ->from('tbl_purcharse_ref')
            ->join('user', 'user.id=tbl_purcharse_ref.user_id')
            ->where('user.isDeleted', false)
            ->get();
        return $Query->result();
    }

    public function View_Welcome_Reffer($user_id)
    {
        $Query = $this->db->select('tbl_welcome_ref.*,user.name')
            ->from('tbl_welcome_ref')
            ->join('user', 'user.id=tbl_welcome_ref.bonus_user_id')
            ->where('user.isDeleted', false)
            ->where('tbl_welcome_ref.user_id', $user_id)
            ->get();
        return $Query->result();
    }

    public function ActiveUser()
    {
        $Query = $this->db->select('user.*')
            ->from('user')
            ->where('user.isDeleted', false)
            ->where('DATE(user.updated_date)>', 'DATE_SUB(CURRENT_TIMESTAMP, INTERVAL +2 DAY)', false)
            ->order_by('user.id', 'desc')
            ->get();
        return $Query->result();
    }

    public function WalletAmount($user_id)
    {
        $this->db->select('tbl_ander_baher_bet.*,tbl_ander_baher.room_id');
        $this->db->from('tbl_ander_baher_bet');
        $this->db->join('tbl_ander_baher', 'tbl_ander_baher.id=tbl_ander_baher_bet.ander_baher_id');
        $this->db->where('tbl_ander_baher_bet.user_id', $user_id);
        $Query = $this->db->get();
        return $Query->result();
    }

    public function DragonWalletAmount($user_id)
    {
        $this->db->select('tbl_dragon_tiger_bet.*,tbl_dragon_tiger.room_id');
        $this->db->from('tbl_dragon_tiger_bet');
        $this->db->join('tbl_dragon_tiger', 'tbl_dragon_tiger.id=tbl_dragon_tiger_bet.dragon_tiger_id');
        $this->db->where('tbl_dragon_tiger_bet.user_id', $user_id);
        $Query = $this->db->get();
        return $Query->result();
    }

    public function TeenPattiLog($user_id)
    {
        $Query = $this->db->query('SELECT `game_id`,SUM(`amount`) as invest,(SELECT IFNULL(user_winning_amt,0) FROM `tbl_game` WHERE winner_id='.$user_id.' AND id=`game_id`) as winning_amount,added_date FROM `tbl_game_log` WHERE `user_id`='.$user_id.' GROUP BY `game_id`');
        // $this->db->get();
        return $Query->result();
    }

    public function RummyLog($user_id)
    {
        $Query = $this->db->query('SELECT * FROM
        (SELECT `game_id`,`user_id`,`action`,`amount`,`added_date` FROM `tbl_rummy_log` WHERE `amount`!=0 AND `user_id`='.$user_id.'
        UNION
        SELECT `id`,`winner_id`,10,`user_winning_amt`,`added_date` FROM `tbl_rummy` WHERE  `winner_id`='.$user_id.') rummy
        ORDER BY added_date ASC');
        // $this->db->get();
        return $Query->result();
    }

    public function RummyDealLog($user_id)
    {
        $Query = $this->db->query('SELECT * FROM
        (SELECT `game_id`,`user_id`,`action`,`amount`,`added_date` FROM `tbl_rummy_deal_log` WHERE `amount`!=0 AND `user_id`='.$user_id.'
        UNION
        SELECT `id`,`winner_id`,10,`user_winning_amt`,`added_date` FROM `tbl_rummy_deal` WHERE  `winner_id`='.$user_id.') rummy
        ORDER BY added_date DESC');
        // $this->db->get();
        return $Query->result();
    }

    public function RummyPoolLog($user_id)
    {
        $Query = $this->db->query('SELECT * FROM
        (SELECT `game_id`,`user_id`,`action`,`amount`,`added_date` FROM `tbl_rummy_pool_log` WHERE `amount`!=0 AND `user_id`='.$user_id.'
        UNION
        SELECT `id`,`winner_id`,10,`user_winning_amt`,`added_date` FROM `tbl_rummy_pool` WHERE  `winner_id`='.$user_id.') rummy
        ORDER BY added_date DESC');
        // $this->db->get();
        return $Query->result();
    }

    public function SevenUpAmount($user_id)
    {
        $this->db->select('tbl_seven_up_bet.*,tbl_seven_up.room_id');
        $this->db->from('tbl_seven_up_bet');
        $this->db->join('tbl_seven_up', 'tbl_seven_up.id=tbl_seven_up_bet.seven_up_id');
        $this->db->where('tbl_seven_up_bet.user_id', $user_id);
        $Query = $this->db->get();
        return $Query->result();
    }

    public function ColorPredictionAmount($user_id)
    {
        $this->db->select('tbl_color_prediction_bet.*,tbl_color_prediction.room_id');
        $this->db->from('tbl_color_prediction_bet');
        $this->db->join('tbl_color_prediction', 'tbl_color_prediction.id=tbl_color_prediction_bet.color_prediction_id');
        $this->db->where('tbl_color_prediction_bet.user_id', $user_id);
        $Query = $this->db->get();
        return $Query->result();
    }

    public function CarRouletteAmount($user_id)
    {
        $this->db->select('tbl_car_roulette_bet.*,tbl_car_roulette.room_id');
        $this->db->from('tbl_car_roulette_bet');
        $this->db->join('tbl_car_roulette', 'tbl_car_roulette.id=tbl_car_roulette_bet.car_roulette_id');
        $this->db->where('tbl_car_roulette_bet.user_id', $user_id);
        $Query = $this->db->get();
        return $Query->result();
    }

    public function AnimalRouletteAmount($user_id)
    {
        $this->db->select('tbl_animal_roulette_bet.*,tbl_animal_roulette.room_id');
        $this->db->from('tbl_animal_roulette_bet');
        $this->db->join('tbl_animal_roulette', 'tbl_animal_roulette.id=tbl_animal_roulette_bet.animal_roulette_id');
        $this->db->where('tbl_animal_roulette_bet.user_id', $user_id);
        $Query = $this->db->get();
        return $Query->result();
    }

    public function JackpotAmount($user_id)
    {
        $this->db->select('tbl_jackpot_bet.*,tbl_jackpot.room_id');
        $this->db->from('tbl_jackpot_bet');
        $this->db->join('tbl_jackpot', 'tbl_jackpot.id=tbl_jackpot_bet.jackpot_id');
        $this->db->where('tbl_jackpot_bet.user_id', $user_id);
        $Query = $this->db->get();
        return $Query->result();
    }

    public function getHistory($user_id)
    {
        $this->db->select('tbl_ludo.*,user.name');
        $this->db->from('tbl_ludo');
        $this->db->join('user', 'user.id=tbl_ludo.winner_id');
        $this->db->where('tbl_ludo.winner_id', $user_id);
        $Query = $this->db->get();
        return $Query->result();
    }

    public function UpdateOfflineUsers()
    {
        $this->db->query('UPDATE `user` SET `ander_bahar_room_id`=0,`dragon_tiger_room_id`=0,`jackpot_room_id`=0,`seven_up_room_id`=0,`color_prediction_room_id`=0,`car_roulette_room_id`=0,`animal_roulette_room_id`=0 WHERE TIME_TO_SEC(TIMEDIFF(NOW(), updated_date))>30');
        return $this->db->affected_rows();
    }

    public function getOnlineUsers($room_id, $game_column)
    {
        $this->db->where($game_column.'>', 0);
        $this->db->where('user.isDeleted', false);
        $Query = $this->db->get('user');
        return $Query->num_rows();
    }

    public function latLongUpdate($id,$lat,$long)
    {
        $data = [
            'lat'=>$lat,
            'lng'=>$long,
            // 'offline_time' => TRUE,
            'updated_date' => date('Y-m-d H:i:s')
        ];
        $this->db->where('id', $id);
        $this->db->where('role',0);
        $this->db->update('tbl_worker', $data);
        return $this->db->last_query();
    }

    public function updatePrice($id,$shop_id,$price,$payment_mode)
    {
        $data = [
            'cost'=>$price,
            'payment_status'=>$payment_mode,
        ];
        $this->db->where('id', $id);
        $this->db->where('shop_id', $shop_id);
        $this->db->update('product_orders', $data);
        return $this->db->last_query();
    }

}