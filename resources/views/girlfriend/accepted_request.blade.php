@extends('layouts.app')

@section('content')
<nav class="blue lighten-1">
  <div class="nav-wrapper container">
    <a href="#!" class="brand-logo center">Rent a Girlfriend</a>
    <a href="#" data-activates="slide-out" class="button-collapse">
      <i class="fa fa-bars"></i>
    </a>
  </div>
</nav><!-- navbar -->

<div class="body-components-container">
  <ul class="collection with-header col l6">
    <li class="collection-header">
      <h5 class="page-title">
        <i class="fa fa-circle green-text"></i> {{ $rent->user->firstname }} {{ $rent->user->lastname }}
      </h5> 
    </li>
    <li class="collection-item coversation-container">
      <div class="row" id="message-container">
        <!-- =================== Message ============= -->
        <div class="sender message-container s12">
          <div class="message blue lighten-1 white-text waves-effect waves-light">
            Ang regular na talata ng Lorem Ipsum, ginagamit simula pa noong 1500s
          </div>
        </div> 
        <!-- =================== Message ============= -->

        <!-- =================== Reply =================== -->
        <div class="reciever message-container s12">
          <img src="{{ asset('images/avatar.png') }}" alt="" class="message-profile">
          <div class="message grey darken-2 white-text waves-effect waves-light">
            Ang regular na talata ng Lorem Ipsum, ginagamit simula pa noong 1500s
          </div>
        </div>
        <!-- =================== Reply =================== -->
      </div>
    </li>
  </ul>
  <ul class="collection message-container">
    <li class="collection-item">
      <div class="input-field">
        <form id="message-form" autocomplete="off">
          <label for=""><i class="fa fa-pencil"></i> Enter Message</label>
          <input type="text" name="message" placeholder="Enter your message here" id="message-input" required>
          <button class="btn btn-flat blue lighten-1 waves-effect waves-light white-text max-width" type="submit">
            <i class="fa fa-send"></i>
          </button>
        </form>
      </div> 
    </li>
  </ul>
</div><!-- body-components-container -->

@endsection

@section('scripts')
  <script src="/js/user/chat.js"></script>
@endsection