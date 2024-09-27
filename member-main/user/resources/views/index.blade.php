@extends('master')
@section('content')
    <section id="index">
        <div class="mt-6 h-full md:h-full bg-cover bg-center"
            style="background-image: url('{{ asset('assets/img/index.svg') }}')">
            <div class="p-8">
                <div class="my-48 lg:ml-16 max-w-lg p-6 rounded-lg">
                    <div>
                        <h5 class="mb-3 text-4xl font-bold tracking-tight text-gray-900">
                            Layanan Cepat, Waktu Tepat, dan Biaya Hemat</h5>
                    </div>
                    <p class="mb-4 font-normal text-gray-900">
                        Dengan jaringan logistik yang luas, kami
                        menawarkan kehandalan dan efisiensi tinggi, menjadikan kami pilihan utama untuk kebutuhan
                        pengiriman
                        Anda.
                    </p>
                    <a href="#layanan"
                        class="inline-flex items-center px-12 py-3 text-sm font-medium text-center text-white bg-red-700 rounded-2xl hover:bg-red-800"
                        style="transition: 2ms">
                        Order Sekarang
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section id="layanan">
        <div class="container mx-auto lg:my-16 my-10">
            <p class="lg:mx-20 mx-10 text-4xl mb-8 font-extrabold text-red-700">LAYANAN KAMI</p>
            <div class="lg:mx-20 mx-10 grid md:grid-cols-2 gap-8">
                <!-- Regular Order-->
                @if (auth()->user() == null)
                    <a href="#layanan" data-modal-target="authentication-modal" data-modal-toggle="authentication-modal">
                        <div class="mt-4 border p-6 shadow-md hover:shadow-xl rounded-lg hover:bg-gray-50 duration-300">
                            <div class="w-min">
                                <h5
                                    class="mb-2 text-3xl font-extrabold tracking-tight text-gray-900 hover:text-red-700 duration-300">
                                    REGULAR</h5>
                            </div>
                            <p class="mb-3 font-normal text-gray-700">
                                Layanan ini dapat digunakan untuk Anda yang ingin mengantarkan barang atau muatan sampai ke
                                tujuan
                                sesuai dengan jadwal yang tertera.
                            </p>
                            <div class="flex items-center gap-3">
                                <p
                                    class="inline-flex items-center py-2 text-base font-medium text-center text-red-700 hover:text-red-800 duration-300 rounded-lg">
                                    <span>Pesan Sekarang</span>
                                    <span class="">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="w-6 h-6 font-medium">
                                            <path
                                                d="M13.1717 12.0007L8.22192 7.05093L9.63614 5.63672L16.0001 12.0007L9.63614 18.3646L8.22192 16.9504L13.1717 12.0007Z">
                                            </path>
                                        </svg>
                                    </span>
                                </p>
                            </div>
                        </div>
                    </a>
                @else
                    <a href="{{ route('order.regular') }}">
                        <div class="mt-4 border p-6 shadow-md hover:shadow-xl rounded-lg hover:bg-gray-50 duration-300">
                            <div class="w-min">
                                <h5
                                    class="mb-2 text-3xl font-extrabold tracking-tight text-gray-900 hover:text-red-700 duration-300">
                                    REGULAR</h5>
                            </div>
                            <p class="mb-3 font-normal text-gray-700">
                                Layanan ini dapat digunakan untuk Anda yang ingin mengantarkan barang atau muatan sampai ke
                                tujuan
                                sesuai dengan jadwal yang tertera.
                            </p>
                            <div class="flex items-center gap-3">
                                <p
                                    class="inline-flex items-center py-2 text-base font-medium text-center text-red-700 hover:text-red-800 duration-300 rounded-lg">
                                    <span>Pesan Sekarang</span>
                                    <span class="">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="w-6 h-6 font-medium">
                                            <path
                                                d="M13.1717 12.0007L8.22192 7.05093L9.63614 5.63672L16.0001 12.0007L9.63614 18.3646L8.22192 16.9504L13.1717 12.0007Z">
                                            </path>
                                        </svg>
                                    </span>
                                </p>
                            </div>
                        </div>
                    </a>
                @endif
                <!-- Private Order-->
                @if (auth()->user() == null)
                    <a href="#layanan" data-modal-target="authentication-modal" data-modal-toggle="authentication-modal">
                        <div class="mt-4  p-6 border shadow-md hover:shadow-xl rounded-lg hover:bg-gray-50 duration-300">
                            <div class="w-min">
                                <h5
                                    class="mb-2 text-3xl font-extrabold tracking-tight text-gray-900 hover:text-red-700 duration-300">
                                    PRIVATE</h5>
                            </div>
                            <p class="mb-3 font-normal text-gray-700">
                                Layanan ini dapat digunakan untuk Anda yang ingin mengantarkan barang atau muatan sampai ke
                                tujuan
                                sesuai dengan keinginan pelanggan dan harga yang dapat dinegosiasikan.
                            </p>
                            <div class="flex items-center gap-3">
                                <p
                                    class="inline-flex items-center py-2 text-base font-medium text-center text-red-700 hover:text-red-800 duration-300 rounded-lg">
                                    Pesan Sekarang
                                    <span class="">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="w-6 h-6 font-medium">
                                            <path
                                                d="M13.1717 12.0007L8.22192 7.05093L9.63614 5.63672L16.0001 12.0007L9.63614 18.3646L8.22192 16.9504L13.1717 12.0007Z">
                                            </path>
                                        </svg>
                                    </span>
                                </p>
                            </div>
                        </div>
                    </a>
                @else
                    <a href="{{ route('order.private') }}">
                        <div class="mt-4  p-6 border shadow-md hover:shadow-xl rounded-lg hover:bg-gray-50 duration-300">
                            <div class="w-min">
                                <h5
                                    class="mb-2 text-3xl font-extrabold tracking-tight text-gray-900 hover:text-red-700 duration-300">
                                    PRIVATE</h5>
                            </div>
                            <p class="mb-3 font-normal text-gray-700">
                                Layanan ini dapat digunakan untuk Anda yang ingin mengantarkan barang atau muatan sampai ke
                                tujuan
                                sesuai dengan keinginan pelanggan dan harga yang dapat dinegosiasikan.
                            </p>
                            <div class="flex items-center gap-3">
                                <p
                                    class="inline-flex items-center py-2 text-base font-medium text-center text-red-700 hover:text-red-800 duration-300 rounded-lg">
                                    Pesan Sekarang
                                    <span class="">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="w-6 h-6 font-medium">
                                            <path
                                                d="M13.1717 12.0007L8.22192 7.05093L9.63614 5.63672L16.0001 12.0007L9.63614 18.3646L8.22192 16.9504L13.1717 12.0007Z">
                                            </path>
                                        </svg>
                                    </span>
                                </p>
                            </div>
                        </div>
                    </a>
                @endif
            </div>
            <div class="lg:mx-20 mx-10 mt-8 border border-gray-500 rounded-lg">
                <div class="lg:px-20 lg:py-10 p-4 gap-28 lg:flex">
                    <div class="border shadow-xl rounded-lg mb-12 lg:mb-0">
                        <h3 class="text-center py-2 font-medium">Peta Lokasi</h3>
                        <div class="border-t">
                            <div class="p-6 md:w-full lg:w-[300px]">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.2955294538774!2d112.53949887525306!3d-7.864110192157829!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e78819e13ac4797%3A0x7352a362944ab7ac!2sKantor%20Pusat%20DKWB!5e0!3m2!1sen!2sid!4v1716101576336!5m2!1sen!2sid"
                                    class="w-full h-[240px]" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                    <div class="block w-full">
                        <div class="py-4">
                            <h3 class="text-lg font-medium mb-3">Lokasi</h3>
                            <p class="font-normal">Jl. Raya Pandanrejo, Pandanrejo, Kec. Bumiaji, Kota Batu, Jawa Timur
                            </p>
                        </div>
                        <div class="block">
                            <h3 class="text-lg font-medium mb-3">Hubungi Kami</h3>
                            <ul>
                                <a href="mailto:ptdkwb@gmail.com">
                                    <li class="flex gap-4 items-center mb-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="w-5 h-5">
                                            <path
                                                d="M3 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3ZM20 7.23792L12.0718 14.338L4 7.21594V19H20V7.23792ZM4.51146 5L12.0619 11.662L19.501 5H4.51146Z">
                                            </path>
                                        </svg>
                                        <p class="font-normal">ptdkwb@gmail.com</p>
                                    </li>
                                </a>
                                <a href="https://www.instagram.com/dkw_batu">
                                    <li class="flex gap-4 items-center mb-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="w-5 h-5">
                                            <path
                                                d="M12.001 9C10.3436 9 9.00098 10.3431 9.00098 12C9.00098 13.6573 10.3441 15 12.001 15C13.6583 15 15.001 13.6569 15.001 12C15.001 10.3427 13.6579 9 12.001 9ZM12.001 7C14.7614 7 17.001 9.2371 17.001 12C17.001 14.7605 14.7639 17 12.001 17C9.24051 17 7.00098 14.7629 7.00098 12C7.00098 9.23953 9.23808 7 12.001 7ZM18.501 6.74915C18.501 7.43926 17.9402 7.99917 17.251 7.99917C16.5609 7.99917 16.001 7.4384 16.001 6.74915C16.001 6.0599 16.5617 5.5 17.251 5.5C17.9393 5.49913 18.501 6.0599 18.501 6.74915ZM12.001 4C9.5265 4 9.12318 4.00655 7.97227 4.0578C7.18815 4.09461 6.66253 4.20007 6.17416 4.38967C5.74016 4.55799 5.42709 4.75898 5.09352 5.09255C4.75867 5.4274 4.55804 5.73963 4.3904 6.17383C4.20036 6.66332 4.09493 7.18811 4.05878 7.97115C4.00703 9.0752 4.00098 9.46105 4.00098 12C4.00098 14.4745 4.00753 14.8778 4.05877 16.0286C4.0956 16.8124 4.2012 17.3388 4.39034 17.826C4.5591 18.2606 4.7605 18.5744 5.09246 18.9064C5.42863 19.2421 5.74179 19.4434 6.17187 19.6094C6.66619 19.8005 7.19148 19.9061 7.97212 19.9422C9.07618 19.9939 9.46203 20 12.001 20C14.4755 20 14.8788 19.9934 16.0296 19.9422C16.8117 19.9055 17.3385 19.7996 17.827 19.6106C18.2604 19.4423 18.5752 19.2402 18.9074 18.9085C19.2436 18.5718 19.4445 18.2594 19.6107 17.8283C19.8013 17.3358 19.9071 16.8098 19.9432 16.0289C19.9949 14.9248 20.001 14.5389 20.001 12C20.001 9.52552 19.9944 9.12221 19.9432 7.97137C19.9064 7.18906 19.8005 6.66149 19.6113 6.17318C19.4434 5.74038 19.2417 5.42635 18.9084 5.09255C18.573 4.75715 18.2616 4.55693 17.8271 4.38942C17.338 4.19954 16.8124 4.09396 16.0298 4.05781C14.9258 4.00605 14.5399 4 12.001 4ZM12.001 2C14.7176 2 15.0568 2.01 16.1235 2.06C17.1876 2.10917 17.9135 2.2775 18.551 2.525C19.2101 2.77917 19.7668 3.1225 20.3226 3.67833C20.8776 4.23417 21.221 4.7925 21.476 5.45C21.7226 6.08667 21.891 6.81333 21.941 7.8775C21.9885 8.94417 22.001 9.28333 22.001 12C22.001 14.7167 21.991 15.0558 21.941 16.1225C21.8918 17.1867 21.7226 17.9125 21.476 18.55C21.2218 19.2092 20.8776 19.7658 20.3226 20.3217C19.7668 20.8767 19.2076 21.22 18.551 21.475C17.9135 21.7217 17.1876 21.89 16.1235 21.94C15.0568 21.9875 14.7176 22 12.001 22C9.28431 22 8.94514 21.99 7.87848 21.94C6.81431 21.8908 6.08931 21.7217 5.45098 21.475C4.79264 21.2208 4.23514 20.8767 3.67931 20.3217C3.12348 19.7658 2.78098 19.2067 2.52598 18.55C2.27848 17.9125 2.11098 17.1867 2.06098 16.1225C2.01348 15.0558 2.00098 14.7167 2.00098 12C2.00098 9.28333 2.01098 8.94417 2.06098 7.8775C2.11014 6.8125 2.27848 6.0875 2.52598 5.45C2.78014 4.79167 3.12348 4.23417 3.67931 3.67833C4.23514 3.1225 4.79348 2.78 5.45098 2.525C6.08848 2.2775 6.81348 2.11 7.87848 2.06C8.94514 2.0125 9.28431 2 12.001 2Z">
                                            </path>
                                        </svg>
                                        <p class="font-normal">@dkw_batu</p>
                                    </li>
                                </a>
                                <a href="https://www.youtube.com/@DKWBBATU">
                                    <li class="flex gap-4 items-center mb-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="w-5 h-5">
                                            <path
                                                d="M19.6069 6.99482C19.5307 6.69695 19.3152 6.47221 19.0684 6.40288C18.6299 6.28062 16.501 6 12.001 6C7.50098 6 5.37252 6.28073 4.93225 6.40323C4.68776 6.47123 4.4723 6.69593 4.3951 6.99482C4.2863 7.41923 4.00098 9.19595 4.00098 12C4.00098 14.804 4.2863 16.5808 4.3954 17.0064C4.47126 17.3031 4.68676 17.5278 4.93251 17.5968C5.37252 17.7193 7.50098 18 12.001 18C16.501 18 18.6299 17.7194 19.0697 17.5968C19.3142 17.5288 19.5297 17.3041 19.6069 17.0052C19.7157 16.5808 20.001 14.8 20.001 12C20.001 9.2 19.7157 7.41923 19.6069 6.99482ZM21.5442 6.49818C22.001 8.28 22.001 12 22.001 12C22.001 12 22.001 15.72 21.5442 17.5018C21.2897 18.4873 20.547 19.2618 19.6056 19.5236C17.8971 20 12.001 20 12.001 20C12.001 20 6.10837 20 4.39637 19.5236C3.45146 19.2582 2.70879 18.4836 2.45774 17.5018C2.00098 15.72 2.00098 12 2.00098 12C2.00098 12 2.00098 8.28 2.45774 6.49818C2.71227 5.51273 3.45495 4.73818 4.39637 4.47636C6.10837 4 12.001 4 12.001 4C12.001 4 17.8971 4 19.6056 4.47636C20.5505 4.74182 21.2932 5.51636 21.5442 6.49818ZM10.001 15.5V8.5L16.001 12L10.001 15.5Z">
                                            </path>
                                        </svg>
                                        <p class="font-normal">DKWB BATU</p>
                                    </li>
                                </a>
                                <a href="https://www.facebook.com/profile.php?id=61559199989035">
                                    <li class="flex gap-4 items-center mb-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="w-5 h-5">
                                            <path
                                                d="M14 13.5H16.5L17.5 9.5H14V7.5C14 6.47062 14 5.5 16 5.5H17.5V2.1401C17.1743 2.09685 15.943 2 14.6429 2C11.9284 2 10 3.65686 10 6.69971V9.5H7V13.5H10V22H14V13.5Z">
                                            </path>
                                        </svg>
                                        <p class="font-normal">Dkenzie Wastu Baswara</p>
                                    </li>
                                </a>
                                <a href="http://wa.me/+6285929935178">
                                    <li class="flex gap-4 items-center mb-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                            class="w-5 h-5">
                                            <path
                                                d="M7.25361 18.4944L7.97834 18.917C9.18909 19.623 10.5651 20 12.001 20C16.4193 20 20.001 16.4183 20.001 12C20.001 7.58172 16.4193 4 12.001 4C7.5827 4 4.00098 7.58172 4.00098 12C4.00098 13.4363 4.37821 14.8128 5.08466 16.0238L5.50704 16.7478L4.85355 19.1494L7.25361 18.4944ZM2.00516 22L3.35712 17.0315C2.49494 15.5536 2.00098 13.8345 2.00098 12C2.00098 6.47715 6.47813 2 12.001 2C17.5238 2 22.001 6.47715 22.001 12C22.001 17.5228 17.5238 22 12.001 22C10.1671 22 8.44851 21.5064 6.97086 20.6447L2.00516 22ZM8.39232 7.30833C8.5262 7.29892 8.66053 7.29748 8.79459 7.30402C8.84875 7.30758 8.90265 7.31384 8.95659 7.32007C9.11585 7.33846 9.29098 7.43545 9.34986 7.56894C9.64818 8.24536 9.93764 8.92565 10.2182 9.60963C10.2801 9.76062 10.2428 9.95633 10.125 10.1457C10.0652 10.2428 9.97128 10.379 9.86248 10.5183C9.74939 10.663 9.50599 10.9291 9.50599 10.9291C9.50599 10.9291 9.40738 11.0473 9.44455 11.1944C9.45903 11.25 9.50521 11.331 9.54708 11.3991C9.57027 11.4368 9.5918 11.4705 9.60577 11.4938C9.86169 11.9211 10.2057 12.3543 10.6259 12.7616C10.7463 12.8783 10.8631 12.9974 10.9887 13.108C11.457 13.5209 11.9868 13.8583 12.559 14.1082L12.5641 14.1105C12.6486 14.1469 12.692 14.1668 12.8157 14.2193C12.8781 14.2457 12.9419 14.2685 13.0074 14.2858C13.0311 14.292 13.0554 14.2955 13.0798 14.2972C13.2415 14.3069 13.335 14.2032 13.3749 14.1555C14.0984 13.279 14.1646 13.2218 14.1696 13.2222V13.2238C14.2647 13.1236 14.4142 13.0888 14.5476 13.097C14.6085 13.1007 14.6691 13.1124 14.7245 13.1377C15.2563 13.3803 16.1258 13.7587 16.1258 13.7587L16.7073 14.0201C16.8047 14.0671 16.8936 14.1778 16.8979 14.2854C16.9005 14.3523 16.9077 14.4603 16.8838 14.6579C16.8525 14.9166 16.7738 15.2281 16.6956 15.3913C16.6406 15.5058 16.5694 15.6074 16.4866 15.6934C16.3743 15.81 16.2909 15.8808 16.1559 15.9814C16.0737 16.0426 16.0311 16.0714 16.0311 16.0714C15.8922 16.159 15.8139 16.2028 15.6484 16.2909C15.391 16.428 15.1066 16.5068 14.8153 16.5218C14.6296 16.5313 14.4444 16.5447 14.2589 16.5347C14.2507 16.5342 13.6907 16.4482 13.6907 16.4482C12.2688 16.0742 10.9538 15.3736 9.85034 14.402C9.62473 14.2034 9.4155 13.9885 9.20194 13.7759C8.31288 12.8908 7.63982 11.9364 7.23169 11.0336C7.03043 10.5884 6.90299 10.1116 6.90098 9.62098C6.89729 9.01405 7.09599 8.4232 7.46569 7.94186C7.53857 7.84697 7.60774 7.74855 7.72709 7.63586C7.85348 7.51651 7.93392 7.45244 8.02057 7.40811C8.13607 7.34902 8.26293 7.31742 8.39232 7.30833Z">
                                            </path>
                                        </svg>
                                        <p class="font-normal">0859 2993 5178 ( Customer Service )</p>
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Modal -->
    <div id="popup-modal" tabindex="-1"
        class="overflow-y-auto overflow-x-hidden fixed z-50 inset-0 top-50 flex justify-center items-center w-full rounded-lg">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative dark:bg-gray-700">
                <button type="button" id="close-btn"
                    class="absolute top-3 end-2.5 bg-transparent border-2 border-gray-900 rounded-full text-gray-900 text-sm w-8 h-8 ms-auto inline-flex justify-center items-center">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <a href="/cek-ongkir">
                    <div
                        class="absolute inset-y-auto inset-x-4 bottom-4 bg-gray-50 hover:bg-gray-100 text-center rounded-lg">
                        <p class="text-red-700 text-lg font-semibold px-4 py-2">Cek ongkos kirim ke rumahmu disini</p>
                    </div>
                </a>
                <div class="text-center items-center rounded-lg">
                    <img class="rounded-lg" src="{{ asset('assets/img/modal.svg') }}" alt="">
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/modals.js') }}"></script>
@endsection
