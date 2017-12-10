@component('mail::message')
<center><img src="{{asset('img/logo-tagline.png')}}" style="width: 350px; height: 250px;"><br>
<p>Hi {{$datas->Advertisement->User->firstName}} !
<br>
Your payment from <a href="{{route('advertisement.show',['id' => $datas->advertisementId])}}">this advertisement</a> has been done, thanks for using ShowUp !

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
