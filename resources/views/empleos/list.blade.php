@foreach($jobs as $job)
    <a href="{{ route('jobs.details', $job->id) }}">{{ $job->title }}</a><br>
@endforeach
