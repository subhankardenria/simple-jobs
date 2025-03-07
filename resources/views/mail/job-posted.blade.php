<h2>
    {{ $job->title }}
</h2>

<p>
    Congrats! Your job is now live on our website.
</p>

<p>
    <a href="{{ route('jobs.show', $job) }}">View your job listing</a>
</p>
