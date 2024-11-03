<h2>
    {{ $job->title }}
</h2>

<p>
Congrats! your job has been posted successfully.
</p>

<p>
    <a href="{{ url('/jobs/' . $job->id )}}"> View Your job listing </a>
</p>