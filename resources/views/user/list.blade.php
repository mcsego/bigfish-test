<div>
    @foreach ($users as $user)
        <p>This is user {{ $user->name }}

            @if($user->userPhones)
                Tel:
                @foreach ($user->userPhones as $phone)
                    {{ $phone->phoneNumber }}
                @endforeach
            @endif
        </p>
    @endforeach
</div>
