@foreach($applicants as $applicant)
    <a href="{{ route('user.profile', $applicant->id) }}">{{ $applicant->name }}</a><br>
@endforeach
