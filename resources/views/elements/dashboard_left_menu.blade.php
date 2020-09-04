@php 
$routeName = Route::currentRouteName(); 
$user_type=Auth::user()->user_type;
//dd($user_type);
@endphp

<div class="left-menu">
    <ul>
        <li><a href="{{ route('dashboard') }}" class="{{($routeName == 'dashboard') ? 'active' : ''}}">Dashboard Home</a></li>
        
        <li><a href="{{ route('editProfile') }}" class="{{($routeName == 'editProfile') ? 'active' : ''}}">My Profile</a></li>
        
        <li><a href="{{ route('changePassword') }}" class="{{($routeName == 'changePassword') ? 'active' : ''}}">Change Password</a></li>
        
        @if($user_type == 'User')
        <li><a href="{{ route('my-orders') }}" class="{{($routeName == 'my-orders') ? 'active' : ''}}">My Order</a></li>
        @elseif($user_type == 'Partner')
        <li><a href="{{ route('new-orders') }}" class="{{($routeName == 'new-orders') ? 'active' : ''}}">New Order</a></li>
        <li><a href="{{ route('orders') }}" class="{{($routeName == 'orders') ? 'active' : ''}}">Order</a></li>
        <li><a href="{{ route('payments') }}" class="{{($routeName == 'payments') ? 'active' : ''}}">Payment</a></li>
        @endif

    </ul>
</div>