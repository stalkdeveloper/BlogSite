@component('mail::message')
<h2>Hello,</h2>
<p> <b>Post Title :</b>  {{ $post['title'] }}
</p>

<p> <b>Author :</b>  {{ $post['author'] }}
</p>


<p> <b>About :</b>  {{ $post['message'] }}
</p>

Hope You Are Doing Well..!<br>

Thanks,<br>
{{ config('app.name') }}<br>
Team.
@endcomponent