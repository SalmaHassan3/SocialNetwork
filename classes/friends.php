<?php
class friends
{

static public function renderfriendship($user_one,$user_two,$type){

if(!empty($user_one)&&!empty($user_two)){
if($user_one!=$user_two){
$db=new PDO('mysql:host=localhost;dbname=socialnetwork','root','');
switch($type){
case 'isthererequestpending':

$query=$db->prepare("select *from friends where (user_id='$user_one' and friend_id='$user_two' and relation='0')");
$query->execute();
return $query->rowcount();
break;

case 'anaelfriendreq':

$query=$db->prepare("select *from friends where (friend_id ='$user_one' and user_id='$user_two' and relation='0')");
$query->execute();
return $query->rowcount();
break;


case 'istherefriendship':
$query=$db->prepare("select *from friends where (user_id='$user_one' and friend_id='$user_two' and relation='1' )or (friend_id ='$user_one' and user_id='$user_two' and relation='1')");
$query->execute();
return $query->rowcount();
break;

}


}

else{
echo"you can't friend yourself";

}
}
}}

