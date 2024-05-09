<div id="cart-modal" class="fixed z-10 inset-0 flex items-center justify-center h-screen overflow-hidden"
     aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
    <div class="bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all w-3/4 ">
        <div class="bg-white px-4 pt-4 pb-4 sm:p-6 sm:pb-4">
            <h3 class="text-lg font-medium" id="modal-title">
                With which cart would you like to continue shopping?
            </h3>
            <div class="mt-8 flex flex-col md:flex-row gap-2">
                @if (!session('afterRegistration'))
                    <form method="POST" action="{{ route('empty-cart') }}" class="w-full">
                        @csrf
                        <button type="submit"
                                class="w-full p-4 bg-neutral-100 rounded hover:bg-black hover:text-white transition-all flex gap-4 md:flex-col items-center justify-center">
                            <i class="fas fa-shopping-cart text-xl md:text-3xl"></i> Empty Cart
                        </button>
                    </form>
                @endif
                <form method="POST" action="{{ route('account-cart') }}" class="w-full">
                    @csrf
                    <button
                        class="w-full p-4 bg-neutral-100 rounded hover:bg-black hover:text-white transition-all flex gap-4 md:flex-col items-center justify-center">
                        <i class="fas fa-user text-xl md:text-3xl"></i> Account Cart
                    </button>
                </form>
                <form method="POST" action="{{ route('guest-cart') }}" class="w-full">
                    @csrf
                    <button
                        class="w-full p-4 bg-neutral-100 rounded hover:bg-black hover:text-white transition-all flex gap-4 md:flex-col items-center justify-center">
                        <i class="fas fa-user-secret text-xl md:text-3xl"></i> Guest Cart
                    </button>
                </form>
                @if (!session('afterRegistration'))
                    <form method="POST" action="{{ route('merge-carts') }}" class="w-full">
                        @csrf
                        <button
                            class="w-full p-4 bg-neutral-100 rounded hover:bg-black hover:text-white transition-all flex gap-4 md:flex-col items-center justify-center">
                            <i class="fas fa-sync-alt text-xl md:text-3xl"></i> Merge Carts
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
