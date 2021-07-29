<h1>New Idol has been registered!</h1>
   
<h3>User Information:<h4>
<div>
    <h4>Full Name : </h4>
    <p>{{ $user->name }}</p>
</div>
<div>
    <h4>User Name : </h4>
    <p>{{ $user->user_name }}</p>
</div>

<div>
    <h4>Korean Name : </h4>
    <p>{{ $user->k_name }}</p>
</div>

<div>
    <h4>Email : </h4>
    <p>{{ $user->email }}</p>
</div>

<div>
    <h4>Phone number : </h4>
    <p>{{ $user->phone }}</p>
</div>

<div>
    <h4>Where can we find you?</h4>
    <p>{{ $user->social_name }}</p>
</div>

<div>
    <h4>What's your username on that platform?</h4>
    <p>{{ $user->followers }}</p>
</div>

<div>
    <h4>How many followers do you have?</h4>
    <p>{{ $user->info }}</p>
</div>

<div>
    <h4>Anything else we should know about you?</h4>
    <p>{{ $user->phone }}</p>
</div>
