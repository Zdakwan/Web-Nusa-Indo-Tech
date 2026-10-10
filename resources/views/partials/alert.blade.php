@if (session('success'))
    <div style="background-color: #dcfce7; color: #16a34a; padding: 15px; margin-bottom: 20px; border-radius: 8px; text-align: center; font-weight: bold;">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div style="background-color: #fee2e2; color: #dc2626; padding: 15px; margin-bottom: 20px; border-radius: 8px; text-align: center; font-weight: bold;">
        {{ session('error') }}
    </div>
@endif

@if ($errors->any())
    <div style="background-color: #fee2e2; color: #dc2626; padding: 15px; margin-bottom: 20px; border-radius: 8px; text-align: center; font-weight: bold;">
        {{ $errors->first() }}
    </div>
@endif