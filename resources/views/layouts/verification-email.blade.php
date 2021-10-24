<h1>CheapTalk</h1>

<p>
    Welcome {{$user->name}}!
</p>

<p>
    You received this email as a result of your registration to our website.
    Please click on the verification link to verify your account.
</p>

<p>
    <a href="{{url('/verification/' . $user->id . '/' . $user->remember_token)}}">Activate account.</a>
</p>