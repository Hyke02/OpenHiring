<footer class="relative bg-[#313d29] mt-[calc(8rem/var(--rem-ratio))] rounded-t-[20px]">
    <style>
        /* Footer styling */
        footer {
            background-color: #313d29;
            margin-top: calc(8rem );
            border-radius: 20px 20px 0 0;
        }

        footer .container {
            margin: 0 auto;
        }

        footer .footer-top {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1rem;
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }

        footer .footer-top .col-span-2 {
            padding-left: 1rem;
            padding-right: 1rem;
        }

        footer h2 {
            margin-bottom: 0.5rem;
            font-size: 1.25rem;
            font-weight: bold;
            color: #f4c542;
        }

        footer .footer-nav {
            padding: 0;
            list-style: none;
        }

        footer .nav-item {
            margin-bottom: 0.5rem;
        }

        footer .nav-link {
            display: inline-block;
            font-size: 1rem;
            font-weight: normal;
            color: #ced0cd;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        footer .nav-link:hover {
            color: #f4c542;
        }

        footer .nav-link .flex {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 0.25rem;
        }

        footer .footer-bottom {
            text-align: center;
            background-color: #313d29;
            padding-top: 1rem;
            padding-bottom: 1rem;
            border-top: 1px solid #e2ecc9;
        }

        footer .footer-bottom p {
            font-size: 0.875rem;
            color: white;
        }

        /* Icon styling */
        footer .nav-link svg {
            fill: #313d29;
            height: 1em;
            width: 1em;
        }
    </style>

    <div class="container mx-auto">
        <nav class="footer-top space-small-top space-bottom grid grid-cols-4 gap-y-8 md:gap-y-0" aria-label="Footer navigation">
            <div class="col-span-2 px-3 md:col-span-1">
                <h2 class="mb-2 text-base font-bold text-yellow md:text-lg">Voor werkzoekenden</h2>
                <ul class="footer-nav p-0 list-none">
                    <li class="nav-item mb-2">
                        <a href="https://www.openhiring.nl/werkgevers" target="_blank" rel="noreferrer noopener" class="nav-link inline-block font-normal text-[#ced0cd] hover:text-yellow">Vind een baan</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="https://www.openhiring.nl/veelgestelde-vragen-van-werkzoekenden" target="_blank" rel="noreferrer noopener" class="nav-link inline-block font-normal text-[#ced0cd] hover:text-yellow">Veelgestelde vragen </a>
                    </li>
                </ul>
            </div>
            <div class="col-span-2 px-3 md:col-span-1">
                <h2 class="mb-2 text-base font-bold text-yellow md:text-lg">Voor werkgevers</h2>
                <ul class="footer-nav p-0 list-none">
                    <li class="nav-item mb-2">
                        <a target="_self" rel="noopener" class="nav-link inline-block font-normal text-[#ced0cd] hover:text-yellow" href="/over-open-hiring#de-spelregels-van-open-hiring">Spelregels</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a target="_self" rel="noopener" class="nav-link inline-block font-normal text-[#ced0cd] hover:text-yellow" href="/faq-werkgevers">Veelgestelde vragen</a>
                    </li>
                </ul>
            </div>
            <div class="col-span-2 px-3 md:col-span-1">
                <h2 class="mb-2 text-base font-bold text-yellow md:text-lg inline pr-1">Over</h2><h2 class="mb-2 text-base font-bold text-yellow md:text-lg inline namen">Open Hiring</h2>
                <ul class="footer-nav p-0 list-none">
                    <li class="nav-item mb-2">
                        <a target="_self" rel="noopener" class="nav-link inline-block font-normal text-[#ced0cd] hover:text-yellow" href="/onstaan">Ontstaan</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a target="_self" rel="noopener" class="nav-link inline-block font-normal text-[#ced0cd] hover:text-yellow" href="/privacy-policy">Privacybeleid</a>
                    </li>
                </ul>
            </div>
            <div class="col-span-2 px-3 md:col-span-1">
                <h2 class="mb-2 text-base font-bold text-yellow md:text-lg">Volg ons op </h2>
                <ul class="footer-nav p-0 list-none">
                    <li class="nav-item mb-2">
                        <a href="https://www.linkedin.com/company/open-hiring-nl/" target="_blank" rel="noreferrer noopener" class="nav-link inline-block font-normal text-[#ced0cd] hover:text-yellow">
                            <div class="mb-1 flex h-5 w-5 items-center justify-center rounded-full bg-gray-300">
                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" class="text-xs text-[#313d29]" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z"></path>
                                </svg>
                            </div>
                            LinkedIn
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="https://www.instagram.com/openhiring_nl" target="_blank" rel="noreferrer noopener" class="nav-link inline-block font-normal text-[#ced0cd] hover:text-yellow">
                            <div class="mb-1 flex h-5 w-5 items-center justify-center rounded-full bg-gray-300">
                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" class="text-xs text-[#313d29]" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.047-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.204-.167-1.485-.276a2.47 2.47 0 0 1-.92-.598c-.28-.28-.454-.546-.598-.919-.11-.281-.24-.705-.276-1.485-.039-.843-.047-1.097-.047-3.232s.008-2.389.047-3.231c.036-.78.166-1.204.276-1.486.145-.374.319-.64.599-.92.28-.28.547-.453.92-.599.281-.11.705-.24 1.486-.275.843-.039 1.096-.046 3.232-.046zM8 4.742a3.258 3.258 0 1 0 0 6.516 3.258 3.258 0 0 0 0-6.516zm0 5.138a1.88 1.88 0 1 1 0-3.759 1.88 1.88 0 0 1 0 3.759z"></path>
                                </svg>
                            </div>
                            Instagram
                        </a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="https://www.facebook.com/OpenHiringNL" target="_blank" rel="noreferrer noopener" class="nav-link inline-block font-normal text-[#ced0cd] hover:text-yellow">
                            <div class="mb-1 flex h-5 w-5 items-center justify-center rounded-full bg-gray-300">
                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 16 16" class="tw-text-xs tw-text-moss-footer" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg"><path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"></path></svg>
                                </svg>
                            </div>
                            Facebook
                        </a>
                    </li>

                </ul>
            </div>
        </nav>
        <div class="footer-bottom text-center bg-[#313d29] py-3 border-t-[1px] border-[#e2ecc9] no-translate namen">
            <p class="text-white text-sm no-translate namen">© Open Hiring 2024</p>
        </div>
    </div>
</footer>
