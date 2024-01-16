<x-layout.auth>


    <div class="flex min-h-screen items-center justify-center dark:bg-dark-dark-light">
        <div class="w-full lg:w-1/2 h-full" x-data="comingsoon">
            <div class="max-w-[480px] mx-auto p-5 md:p-10">
                <h4 class="text-primary text-2xl md:text-4xl font-bold mb-2">Coming Soon</h4>
                <p class="text-base font-bold mb-10 text-white-dark">We will be here in a shortwhile.....</p>
                <div class="flex space-x-4 rtl:space-x-reverse text-white font-semibold text-center mb-10 md:mb-20"
                    x-init="setTimerDemo1">
                    <div class="bg-primary rounded-md w-[95px] h-[95px] flex flex-col items-center justify-center">
                        <h1 x-text="demo1.days"></h1>
                        <span>Days</span>
                    </div>
                    <div class="bg-primary rounded-md w-[95px] h-[95px] flex flex-col items-center justify-center">
                        <h1 x-text="demo1.hours"></h1>
                        <span>Hours</span>
                    </div>
                    <div class="bg-primary rounded-md w-[95px] h-[95px] flex flex-col items-center justify-center">
                        <h1 x-text="demo1.minutes"></h1>
                        <span>Mins</span>
                    </div>
                    <div class="bg-primary rounded-md w-[95px] h-[95px] flex flex-col items-center justify-center">
                        <h1 x-text="demo1.seconds"></h1>
                        <span>Secs</span>
                    </div>
                </div>
                <h3 class="text-xl font-bold mb-10 text-center">Subscribe to get notified!</h3>
                <form method="POST" class="mb-5" action="{{ route('store') }}">
                    @csrf
                    <div class="relative max-w-[580px] mx-auto">
                        <span class="absolute ltr:left-2 rtl:right-2 top-3 text-primary">

                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="w-5 h-5">
                                <path
                                    d="M12 18C8.68629 18 6 15.3137 6 12C6 8.68629 8.68629 6 12 6C15.3137 6 18 8.68629 18 12C18 12.7215 17.8726 13.4133 17.6392 14.054C17.5551 14.285 17.4075 14.4861 17.2268 14.6527L17.1463 14.727C16.591 15.2392 15.7573 15.3049 15.1288 14.8858C14.6735 14.5823 14.4 14.0713 14.4 13.5241V12M14.4 12C14.4 13.3255 13.3255 14.4 12 14.4C10.6745 14.4 9.6 13.3255 9.6 12C9.6 10.6745 10.6745 9.6 12 9.6C13.3255 9.6 14.4 10.6745 14.4 12Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                <path opacity="0.5"
                                    d="M2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12Z"
                                    stroke="currentColor" stroke-width="1.5" />
                            </svg>
                        </span>
                        <input type="email" placeholder="Email"
                            class="form-input ltr:pl-9 rtl:pr-9 py-3 ltr:pr-[100px] rtl:pl-[100px]" />
                        <button class="btn btn-primary absolute top-0 ltr:right-0 rtl:left-0 py-2.5 rounded-bl-3xl">Subscribe</button>
                    </div>
                </form>
                <p class="text-center"> © 2022. <a href="/" class="router-link-active">SOJILEARN</a> All Rights
                    Reserved.</p>
            </div>
        </div>
        <div class="bg-[#060818] w-1/2 min-h-screen hidden lg:flex items-center justify-center p-4">
            <img src="/assets/images/coming-soon.svg" alt="coming_soon"
                class="lg:max-w-[370px] xl:max-w-[500px] mx-auto" />
        </div>
    </div>

    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("comingsoon", () => ({
                timer1: null,
                demo1: {
                    days: null,
                    hours: null,
                    minutes: null,
                    seconds: null,
                },
                setTimerDemo1() {
                    let date = new Date();
                    date.setFullYear(date.getFullYear() + 30);
                    let countDownDate = date.getTime();

                    this.timer1 = setInterval(() => {
                        let now = new Date().getTime();

                        let distance = countDownDate - now;

                        this.demo1.days = Math.floor(distance / (1000 * 60 * 60 * 24));
                        this.demo1.hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (
                            1000 * 60 * 60));
                        this.demo1.minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 *
                            60));
                        this.demo1.seconds = Math.floor((distance % (1000 * 60)) / 1000);

                        if (distance < 0) {
                            clearInterval(this.timer1);
                        }
                    }, 500);
                },
            }));
        });
    </script>

</x-layout.auth>
