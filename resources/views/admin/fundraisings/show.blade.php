<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Fundraising Details') }}
            </h2>
        </div>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">
                <div class="item-card flex flex-row gap-y-10 justify-between items-center">
                    <div class="flex flex-row items-center gap-x-3">
                        <img src="{{ Storage::url($fundraising->thumbnail) }}" alt="" class="rounded-2xl object-cover w-[200px] h-[150px]">
                        <div class="flex flex-col">
                            <h3 class="text-indigo-950 text-xl font-bold">{{ $fundraising->name }}</h3>
                            <p class="text-slate-500 text-sm">{{ $fundraising->category->name }}</p>
                        </div>
                    </div>
                    <div class="flex flex-col">
                        <p class="text-slate-500 text-sm">Donaturs</p>
                        <h3 class="text-indigo-950 text-xl font-bold">{{ $fundraising->donaturs->count() }}</h3>
                    </div>
                    <div class="flex flex-row items-center gap-x-3">
                        <a href="{{ route('admin.fundraisings.edit', $fundraising) }}" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Edit
                        </a>
                        <form action="{{ route('admin.fundraisings.destroy', $fundraising) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="font-bold py-4 px-6 bg-red-700 text-white rounded-full">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>

                <hr class="my-5">
                <div class="flex flex-row justify-between items-center">
                    <div>
                        <h3 class="text-indigo-950 text-xl font-bold">Rp {{ number_format($totalDonations,0,',','.') }}</h3>
                        <p class="text-slate-500 text-sm">Funded</p>
                    </div>
                    <div class="w-[400px] rounded-full h-2.5 bg-slate-300">
                        <div class="bg-indigo-600 h-2.5 rounded-full" style="width: {{ $percentage }}"></div>
                    </div>
                    <div>
                        <h3 class="text-indigo-950 text-xl font-bold">Rp {{ number_format($fundraising->target_amount,0,',','.') }}</h3>
                        <p class="text-slate-500 text-sm">Goal</p>
                    </div>
                </div>
                

                @if($goalReached)
                <hr class="my-5">
                <h3 class="text-indigo-950 text-2xl font-bold">Withdraw Donations</h3>

                <form method="POST" action="#" enctype="multipart/form-data">
                    @csrf

                    <div>
                        <x-input-label for="bank_name" :value="__('bank_name')" />
                        <x-text-input id="bank_name" class="block mt-1 w-full" type="text" name="bank_name" :value="old('bank_name')" required autofocus autocomplete="bank_name" />
                        <x-input-error :messages="$errors->get('bank_name')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="bank_account_name" :value="__('bank_account_name')" />
                        <x-text-input id="bank_account_name" class="block mt-1 w-full" type="text" name="bank_account_name" :value="old('bank_account_name')" required autofocus autocomplete="bank_account_name" />
                        <x-input-error :messages="$errors->get('bank_account_name')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="bank_account_number" :value="__('bank_account_number')" />
                        <x-text-input id="bank_account_number" class="block mt-1 w-full" type="text" name="bank_account_number" :value="old('bank_account_number')" required autofocus autocomplete="bank_account_number" />
                        <x-input-error :messages="$errors->get('bank_account_number')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
            
                        <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Request Withdraw
                        </button>
                    </div>
                </form>
                @endif

                <hr class="my-5">

                <div class="flex flex-row justify-between items-center">
                    <div class="flex flex-col">
                        <h3 class="text-indigo-950 text-xl font-bold">Donaturs</h3>
                    </div>
                </div>

                @forelse($fundraising->donaturs as $donatur)
                <div class="item-card flex flex-row gap-y-10 justify-between items-center">
                    <div class="flex flex-row items-center gap-x-3">
                        <div class="flex flex-col">
                            <h3 class="text-indigo-950 text-xl font-bold">Rp {{ number_format($donatur->total_amount,0,',','.') }}</h3>
                            <p class="text-slate-500 text-sm">{{ $donatur->name }}</p>
                        </div>
                    </div>

                    <p class="text-slate-500 text-sm">{{ $donatur->notes }}</p>
                    
                </div>
                @empty
                <p>Belum ada yang memberikan donasi.</p>
                @endforelse
                
            </div>
        </div>
    </div>
</x-app-layout>
