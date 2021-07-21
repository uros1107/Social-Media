<h1>New Idol Registration Required!</h1>
   
<h4>User Information:<h4>
<div style="display:flex">
    <h5>Full Name</h5>
    <p>{{ $idol_information['name'] }}</p>
</div>
<div style="display:flex">
    <h5>Korean Name</h5>
    <p>{{ $idol_information['k_name'] }}</p>
</div>

<div style="display:flex">
    <h5>Email</h5>
    <p>{{ $idol_information['email'] }}</p>
</div>

<div style="display:flex">
    <h5>Phone Number</h5>
    <p>{{ $idol_information['phone'] }}</p>
</div>

<div style="display:flex">
    <h5>Where can we find you?</h5>
    <p>{{ $idol_information['where_find'] }}</p>
</div>

<div style="display:flex">
    <h5>What's your username on that platform?</h5>
    <p>{{ $idol_information['social_name'] }}</p>
</div>

<div style="display:flex">
    <h5>How many followers do you have?</h5>
    <p>{{ $idol_information['followers'] }}</p>
</div>

<div style="display:flex">
    <h5>Anything else we should know about you?</h5>
    <p>{{ $idol_information['info'] }}</p>
</div>

