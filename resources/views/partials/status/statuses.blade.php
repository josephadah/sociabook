@foreach($statuses as $status)
  <div class="media" style="border:1px solid #3097d1; border-radius: 10px; padding: 5px;">
    <div class="media-left">
      <a href="{{ route('users.profile', $status->user->username) }}">
        <img class="media-object" src="images/avatar.png" style="width:40px; border-radius: 50%" alt="{{ $status->user->username }}">
      </a>
    </div>
    <div class="media-body">
      <h4 class="media-heading" style="border-bottom: 1px solid #3097d1; padding-bottom: 5px;">{{ $status->user->username }}, <small><i>Posted, {{ $status->created_at->diffForHumans() }}</i></small></h4>
      <p style="font-size: 1.3em;">{{ $status->body }}</p>

      <div class="row">
        <div class="col-md-8 col-md-offset-2" style="border-top:1px solid #3097d1; padding: 5px;">

          @if($status->comments->count())
              <h5><strong>Comments</strong></h5>
              @foreach($status->comments as $comment)
              <div class="well" style="margin:1px; padding:1px 15px;">
                <p class="text-muted text-right"><strong>{{ $comment->commenter->username }}</strong>, {{ $comment->created_at->diffForHumans() }}</p>
                <p>{{ $comment->body }}</p>
              </div>
              @endforeach
  
          @endif

          @if(Auth::user())
            <form  method="POST" action="{{ route('comments.store', $status->id) }}">
              {{ csrf_field() }}
                <input type="hidden" name="statusId" value="{{ $status->id }}">
                <div class="form-group">
                  <textarea name="body" id="body" class="form-control" rows="1" placeholder="Add Comment ..."></textarea>
                  <button type="submit" class="btn btn-primary btn-xs pull-right">Submit</button>
                </div>
            </form>
          @endif

        </div>
      </div>
    </div>
  </div>

@endforeach