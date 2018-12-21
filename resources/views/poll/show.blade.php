@extends('layouts.app')

@section('content')
<div class="col-12 col-md-8">
    @include('poll.partials.card')

    @includeWhen($poll->is_proposed, 'poll.partials.card-support')

    @includeWhen($poll->is_current, 'poll.partials.card-vote')

    @includeWhen($poll->is_ended, 'poll.partials.card-results')
</div>

<div class="col-12 col-md-4">
    @include('poll.partials.card-infos')
</div>
@endsection
