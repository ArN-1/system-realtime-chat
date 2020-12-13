@extends('home')

@section('conversation')
<!-- Conversation Start -->
<div class="col-sm-8 conversation">
  <!-- Heading -->
  <div class="row heading">
    <div class="col-sm-2 col-md-1 col-xs-3 heading-avatar">
      <div class="heading-avatar-icon">
        <img src="/image/avatar.png">
      </div>
    </div>
    <div class="col-sm-8 col-xs-7 heading-name">
      <a class="heading-name-meta">{{ $sender->name }}
      </a>
      <span class="heading-online">Online</span>
    </div>
    <div class="col-sm-1 col-xs-1  heading-dot pull-right">
      <i class="fa fa-ellipsis-v fa-2x  pull-right" aria-hidden="true"></i>
    </div>
  </div>
  <!-- Heading End -->

  <!-- Chat Room -->
    <!-- Message Box -->
    <chat-log :messages="messages" :param="{{ Request::segment(2) }}"></chat-log>
    <!-- Message Box End -->

    <!-- Reply Box -->
    <chat-reply :param="{{ Request::segment(2) }}" :sender="'{{ Auth::user()->name }}'" v-on:messagesent="AddMessage"></chat-reply>
    <!-- Reply Box End -->
  <!-- End Chat Room -->
</div>
<!-- Conversation End -->
@stop
