<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">
    <link href="{{ asset('assets/img/logo 4.svg') }}" rel="icon">

    <title>DKWB</title>

</head>

<body style="background-color: #F9F4EA; font-family: Plus Jakarta Sans">
    <section>
        <div class="container max-w-full h-full">
            <!-- Header -->
            <div class="p-4 flex lg:justify-start justify-center">
                <img src="{{ asset('assets/img/dkwbcar.svg') }}" alt="">
            </div>
            <div class="container flex justify-center max-w-full">
                <div class="absolute hidden lg:flex justify-center w-full">
                    <img class="h-[520px]" src="{{ asset('assets/img/mid.svg') }}" alt="">
                </div>
                <div class="absolute mt-6 h-5/6 flex justify-center lg:items-end md:items-center items-end bottom-0">
                    <img class="lg:h-[520px] h-[520px] object-cover"
                        src="{{ asset('storage/profile/' . $driver->images->first()->filepath) }}" alt="Avatar Driver">
                </div>
                <!-- Responsive -->
                <div class="lg:hidden absolute text-center uppercase backdrop-blur-sm rounded-lg p-4 font-bold mt-2">
                    <p class="text-4xl mb-4" style="color: #691317">profil driver</p>
                    <p class="text-2xl">{{ $driver->fullname }}</p>
                    <p class="text-lg">{{ $umur }} tahun</p>
                </div>
                <div class="lg:hidden flex justify-center absolute bottom-0 rounded-tl-full rounded-tr-full w-screen h-[200px] md:h-[400px]"
                    style="background-color: #691317">
                </div>
                <!-- Content -->
                <div class="lg:hidden container mb-14 md:mb-64 bottom-0 absolute text-center bg-gray-40">
                    <div class="flex justify-center items-end gap-8 mb-12">
                        <!-- Arrow Left -->
                        <svg id="arrow-left" width="35" height="35" viewBox="0 0 35 35" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M21.875 26.25L13.125 17.5L21.875 8.75" stroke="white" stroke-width="2.91667"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <!-- Content -->
                        <div id="content-icon" class="w-24 h-24">
                            <img src="{{ asset('assets/slide/person.svg') }}" alt="icon" class="w-full h-full">
                        </div>
                        <!-- Arrow Right -->
                        <svg id="arrow-right" width="35" height="35" viewBox="0 0 35 35" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.125 26.25L21.875 17.5L13.125 8.75" stroke="white" stroke-width="2.91667"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <p id="content-text" class="text-slate-200 text-2xl font-normal uppercase text-3xl font-semibold">
                        {{ $driver->memberid }}
                    </p>
                </div>
            </div>
            <!-- Large -->
            <div class="absolute w-full pt-20">
                <!-- Row 1 -->
                <div
                    class="hidden lg:flex lg:justify-center lg:gap-[420px] lg:items-center lg:max-w-full lg:mx-auto lg:mb-24">
                    <div class="flex justify-end items-center gap-4 w-[320px]">
                        <p class="text-xl font-medium pt-1">{{ $driver->memberid }}</p>
                        <svg xmlns="http://www.w3.org/2000/svg" height="52px" viewBox="0 -960 960 960" width="52px"
                            fill="#691317">
                            <path
                                d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-160v-112q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v112H160Zm80-80h480v-32q0-11-5.5-20T700-306q-54-27-109-40.5T480-360q-56 0-111 13.5T260-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T560-640q0-33-23.5-56.5T480-720q-33 0-56.5 23.5T400-640q0 33 23.5 56.5T480-560Zm0-80Zm0 400Z" />
                        </svg>
                    </div>
                    <div class="w-[320px]">
                        <p class="text-4xl font-semibold uppercase">{{ $driver->fullname }}</p>
                        <p class="text-2xl font-medium">{{ $umur }} Tahun</p>
                    </div>
                </div>
                <!-- Row 2 -->
                <div
                    class="hidden lg:flex lg:justify-center lg:gap-[640px] lg:items-center lg:max-w-full lg:mx-auto lg:mb-16">
                    <div class="flex justify-end items-center gap-4 w-[360px]">
                        <p class="text-xl font-medium pt-1 uppercase">{{ $driver->lisence }}</p>
                        <svg xmlns="http://www.w3.org/2000/svg" height="52px" viewBox="0 -960 960 960" width="52px"
                            fill="#691317">
                            <path
                                d="M880-720v480q0 33-23.5 56.5T800-160H160q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800h640q33 0 56.5 23.5T880-720Zm-720 80h640v-80H160v80Zm0 160v240h640v-240H160Zm0 240v-480 480Z" />
                        </svg>
                    </div>
                    <div class="flex items-center gap-4 w-[360px]">
                        <svg width="52" height="52" viewBox="0 0 73 73" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M27.1634 63.3803V41.0463C27.1634 39.356 27.1634 38.5108 27.4923 37.8652C27.7817 37.2973 28.2434 36.8356 28.8113 36.5462C29.4569 36.2173 30.3021 36.2173 31.9924 36.2173H40.4431C42.1334 36.2173 42.9786 36.2173 43.6242 36.5462C44.1921 36.8356 44.6538 37.2973 44.9431 37.8652C45.2721 38.5108 45.2721 39.356 45.2721 41.0463V63.3803M33.253 8.34202L12.7832 24.263C11.4149 25.3272 10.7308 25.8593 10.2379 26.5257C9.80127 27.116 9.47602 27.7811 9.27811 28.4881C9.05469 29.2863 9.05469 30.153 9.05469 31.8865V53.7224C9.05469 57.103 9.05469 58.7933 9.7126 60.0845C10.2913 61.2203 11.2147 62.1437 12.3505 62.7224C13.6417 63.3803 15.3321 63.3803 18.7127 63.3803H53.7228C57.1034 63.3803 58.7937 63.3803 60.0849 62.7224C61.2207 62.1437 62.1442 61.2203 62.7229 60.0845C63.3808 58.7933 63.3808 57.103 63.3808 53.7224V31.8865C63.3808 30.153 63.3808 29.2863 63.1574 28.4881C62.9594 27.7811 62.6342 27.116 62.1976 26.5257C61.7047 25.8593 61.0205 25.3272 59.6522 24.263L39.1824 8.34202C38.1221 7.51731 37.5919 7.10496 37.0065 6.94645C36.49 6.80659 35.9455 6.80659 35.429 6.94645C34.8435 7.10496 34.3134 7.51731 33.253 8.34202Z"
                                stroke="#691317" stroke-width="6.03623" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                        <div class="">
                            <p class="text-4xl font-medium uppercase">{{ $driver->birthloc }}</p>
                            <p class="text-2xl font-medium">{{ $driver->birthdate }}</p>
                        </div>
                    </div>
                </div>
                <!-- Row 3 -->
                <div
                    class="hidden lg:flex lg:justify-center lg:gap-[640px] lg:items-center lg:max-w-full lg:mx-auto lg:mb-24">
                    <div class="flex justify-end items-center gap-4 w-[360px]">
                        <p class="text-xl font-medium pt-1 uppercase">{{ $pengalaman }} Tahun</p>
                        <svg width="52" height="52" viewBox="0 0 102 102" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M41.8653 70.4522H59.9203M34.6433 20.8009H67.1423C68.8276 20.8009 69.6702 20.8009 70.3139 21.1289C70.8801 21.4174 71.3405 21.8777 71.629 22.4439C71.9569 23.0876 71.9569 23.9303 71.9569 25.6156V31.8581C71.9569 33.3302 71.9569 34.0662 71.7907 34.7588C71.6432 35.3729 71.4001 35.96 71.0701 36.4984C70.6979 37.1058 70.1775 37.6262 69.1366 38.6671L60.3156 47.4881C59.1239 48.6798 58.5281 49.2756 58.3048 49.9627C58.1085 50.5671 58.1085 51.2181 58.3048 51.8225C58.5281 52.5095 59.1239 53.1054 60.3156 54.2971L69.1366 63.118C70.1775 64.1589 70.6979 64.6794 71.0701 65.2867C71.4001 65.8252 71.6432 66.4122 71.7907 67.0263C71.9569 67.719 71.9569 68.455 71.9569 69.927V76.1696C71.9569 77.8549 71.9569 78.6975 71.629 79.3412C71.3405 79.9074 70.8801 80.3678 70.3139 80.6563C69.6702 80.9842 68.8276 80.9842 67.1423 80.9842H34.6433C32.958 80.9842 32.1153 80.9842 31.4716 80.6563C30.9054 80.3678 30.4451 79.9074 30.1566 79.3412C29.8286 78.6975 29.8286 77.8549 29.8286 76.1696V69.927C29.8286 68.455 29.8286 67.719 29.9949 67.0263C30.1423 66.4122 30.3855 65.8252 30.7155 65.2867C31.0877 64.6794 31.6081 64.1589 32.649 63.118L41.47 54.2971C42.6616 53.1054 43.2575 52.5095 43.4807 51.8225C43.6771 51.2181 43.6771 50.5671 43.4807 49.9627C43.2575 49.2756 42.6616 48.6797 41.47 47.4881L32.649 38.6671C31.6081 37.6262 31.0877 37.1058 30.7155 36.4984C30.3855 35.96 30.1423 35.3729 29.9949 34.7588C29.8286 34.0662 29.8286 33.3302 29.8286 31.8581V25.6156C29.8286 23.9303 29.8286 23.0876 30.1566 22.4439C30.4451 21.8777 30.9054 21.4174 31.4716 21.1289C32.1153 20.8009 32.958 20.8009 34.6433 20.8009Z"
                                stroke="#691317" st roke-width="5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <div class="flex items-center gap-4 w-[360px]">
                        <svg width="52" height="52" viewBox="0 0 73 73" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_606_627)">
                                <path
                                    d="M52.0117 51.9899C52.0117 53.187 52.4873 54.335 53.3337 55.1815C54.1802 56.028 55.3282 56.5035 56.5253 56.5035C57.7224 56.5035 58.8704 56.028 59.7169 55.1815C60.5634 54.335 61.0389 53.187 61.0389 51.9899C61.0389 50.7928 60.5634 49.6448 59.7169 48.7983C58.8704 47.9519 57.7224 47.4763 56.5253 47.4763C55.3282 47.4763 54.1802 47.9519 53.3337 48.7983C52.4873 49.6448 52.0117 50.7928 52.0117 51.9899Z"
                                    stroke="#691317" stroke-width="5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path
                                    d="M11.3896 51.9899C11.3896 53.187 11.8652 54.335 12.7116 55.1815C13.5581 56.028 14.7062 56.5035 15.9032 56.5035C17.1003 56.5035 18.2484 56.028 19.0948 55.1815C19.9413 54.335 20.4168 53.187 20.4168 51.9899C20.4168 50.7928 19.9413 49.6448 19.0948 48.7983C18.2484 47.9519 17.1003 47.4763 15.9032 47.4763C14.7062 47.4763 13.5581 47.9519 12.7116 48.7983C11.8652 49.6448 11.3896 50.7928 11.3896 51.9899Z"
                                    stroke="#691317" stroke-width="5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M58.7819 33.9355H40.7275" stroke="#691317" stroke-width="5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    d="M61.0389 51.9899H65.5525C66.7496 51.9899 67.8977 51.5144 68.7441 50.6679C69.5906 49.8215 70.0661 48.6734 70.0661 47.4763V42.9628C70.0661 38.6267 68.5857 38.7862 58.7822 33.9356L55.9777 22.7178C55.4893 20.7652 54.3622 19.0318 52.7757 17.7931C51.1892 16.5544 49.2342 15.8814 47.2214 15.8812H6.87589C5.67881 15.8812 4.53077 16.3568 3.6843 17.2032C2.83784 18.0497 2.3623 19.1977 2.3623 20.3948V47.4763C2.3623 48.6734 2.83784 49.8215 3.6843 50.6679C4.53077 51.5144 5.67881 51.9899 6.87589 51.9899H11.3895"
                                    stroke="#691317" stroke-width="5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M52.0111 51.9899H20.416" stroke="#691317" stroke-width="5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M40.7275 15.8812V51.9899" stroke="#691317" stroke-width="5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M31.7008 33.9355H11.3896V24.9083H31.7008V33.9355Z" stroke="#691317"
                                    stroke-width="5" stroke-linecap="round" stroke-linejoin="round" />
                            </g>
                            <defs>
                                <clipPath id="clip0_606_627">
                                    <rect width="72.2174" height="72.2174" fill="white"
                                        transform="translate(0.105469 0.0836182)" />
                                </clipPath>
                            </defs>
                        </svg>
                        <a href="#armada" class="text-xl font-medium pt-1 uppercase">Armada</a>
                    </div>
                </div>
                <!-- Row 4 -->
                <div
                    class="hidden lg:flex lg:justify-center lg:gap-[420px] lg:items-center lg:max-w-full lg:mx-auto lg:mb-16">
                    <div class="flex justify-end items-center gap-4 w-[320px]">
                        <p class="text-xl font-medium pt-1 whitespace-nowrap uppercase">{{ $driver->insurance }}</p>
                        <svg width="52" height="52" viewBox="0 0 73 73" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M47.1837 34.698H44.1747L39.6611 43.7252L33.643 25.6709L29.1294 34.698H26.1204M36.6315 15.5479C30.6153 8.51447 20.5829 6.6225 13.0451 13.063C5.50728 19.5035 4.44606 30.2717 10.3656 37.8889C14.8367 43.6423 27.5385 55.1926 33.4866 60.5003C34.58 61.4761 35.1267 61.9639 35.7669 62.156C36.3227 62.3227 36.9403 62.3227 37.496 62.156C38.1362 61.9639 38.6829 61.4761 39.7763 60.5003C45.7244 55.1926 58.4262 43.6423 62.8973 37.8889C68.8168 30.2717 67.8852 19.4357 60.2178 13.063C52.5504 6.69025 42.6476 8.51447 36.6315 15.5479Z"
                                stroke="#691317" stroke-width="6.01811" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </div>
                    <div class="flex items-center gap-4 w-[320px]">
                        <svg width="52" height="52" viewBox="0 0 74 74" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M67.1723 36.9999H55.1361L46.1089 64.0814L28.0546 9.91846L19.0274 36.9999H6.99121"
                                stroke="#691317" stroke-width="6.01811" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                        <p class="text-xl font-medium pt-1 uppercase">
                            {{ $driver->status == 1 ? 'Aktif' : 'Non-Aktif' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Armada -->
    <section id="armada">
        <div class="text-center my-8">
            <p class="text-4xl font-bold uppercase">Armada</p>
        </div>
        <div class="w-full h-full mx-auto justify-center p-4 grid gap-4 sm:gap-6 grid-cols-1 sm:grid-cols-3">
            @foreach ($truckImage as $truck)
                <div
                    class="pb-14 px-4 pt-4 h-min flex justify-center bg-white rounded-lg border shadow-md hover:bg-gray-50 hover:shadow-xl duration-300">
                    <img class="w-full h-auto object-cover border rounded-lg hover:brightness-105 duration-300"
                        src="{{ asset('storage/truck/' . $truck->filepath) }}" alt="Truck Driver">
                </div>
            @endforeach
        </div>

    </section>
</body>

<script>
    const assetPath = "{{ asset('') }}";
    const memberid = "{{ $driver->memberid }}";
    const birthloc = "{{ $driver->birthloc }}";
    const birthdate = "{{ $driver->birthdate }}";
    const statuss = "{{ $driver->status }}";
    const lisence = "{{ $driver->lisence }}";
    const insurance = "{{ $driver->insurance }}";
    const pengalaman = "{{ $pengalaman }}";
</script>
<script src="{{ asset('assets/js/prslider.js') }}"></script>

</html>
