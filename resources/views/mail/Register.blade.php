@component('mail::message')
<center><img src="{{asset('img/logo-tagline.png')}}" style="width: 350px; height: 250px;"><br>
<p>Dear {{$datas->firstName}}
<br>
Thanks for register at ShowUp! . Your account has been activated , you can start using all features of show up, don’t tell anyone about your password and username,if you have any trouble about this account please kindly contact our support team.
</p>
</center>
<br><br>
Feel free to explore <br>
ShowUp!<br>
More info?<br>
Email : public.relation@showup.id<br>
FB : Show Up<br>
Ig : <a href="https://www.instagram.com/showup.official/">@showup.official</a> <br>
OA Line : @bnc3443w<br>
Website : http://www.showup.id
@endcomponent
