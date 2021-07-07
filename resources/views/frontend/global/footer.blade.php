<footer class="b-footer ">
    <div class="b-footer__container container">
<div class="b-footer__row row no-gutters">

        <div class="b-footer__logo  ">
            <a href="" class="b-footer__logo-link">
                <img src="/images/footer/logo.svg" alt="{{config('app.name')}}" class="b-footer__logo-img">
            </a>
        </div>
        <nav class="b-footer__menu  ">
            <ul class="b-footer__menu-list">

                @foreach($_footerMenu as $menuItem)
                    <li class="b-footer__menu-item">
                        <a href="{{$menuItem->url}}" class="b-footer__menu-item-link">{{$menuItem->title}}</a>
                    </li>
                @endforeach
            </ul>
        </nav>

        <div class="b-footer__social-and-payment ">
            <div class="b-footer__social-list">
                <div class="b-footer__social-item">
                    <a href="{{config('site.social.facebook')}}"  target="_blank" class="b-footer__social-link">
                        <svg class="b-footer__social-image"   viewBox="0 0 30 30" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M29.959 15C29.959 6.73774 23.2623 0.0410156 15 0.0410156C6.73774 0.0410156 0.0410156 6.73774 0.0410156 15C0.0410156 22.4672 5.50823 28.6558 12.664 29.7787V19.3279H8.86888V15H12.664V11.705C12.664 7.95905 14.8935 5.88528 18.3115 5.88528C19.9509 5.88528 21.664 6.18036 21.664 6.18036V9.86069H19.7787C17.9181 9.86069 17.3443 11.0164 17.3443 12.1968V15H21.4918L20.8279 19.3279H17.3443V29.7787C24.4918 28.6558 29.959 22.4672 29.959 15Z"
                                fill="#1877F2"/>
                            <path
                                d="M20.8199 19.3279L21.4838 15H17.3362V12.1967C17.3362 11.0164 17.9182 9.86066 19.7707 9.86066H21.6559V6.18034C21.6559 6.18034 19.9428 5.88525 18.3035 5.88525C14.8854 5.88525 12.6559 7.95902 12.6559 11.7049V15H8.86084V19.3279H12.6559V29.7787C13.4182 29.9016 14.1969 29.959 14.992 29.959C15.7871 29.959 16.5658 29.8934 17.3281 29.7787V19.3279H20.8199Z"
                                fill="white"/>
                        </svg>

                    </a>
                </div>
                <div class="b-footer__social-item">
                    <a href="{{config('site.social.instagram')}}" target="_blank" class="b-footer__social-link">
                        <svg class="b-footer__social-image"   viewBox="0 0 28 28" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M27.227 4.85792C27.5713 5.74535 27.8084 6.76284 27.8773 8.24699C27.9461 9.73114 27.9614 10.2131 27.9614 14C27.9614 17.7869 27.9461 18.2612 27.8773 19.753C27.8084 21.2372 27.5713 22.2546 27.227 23.1421C26.8751 24.0601 26.3931 24.8404 25.6204 25.6131C24.8478 26.3858 24.0674 26.8601 23.1494 27.2197C22.262 27.5639 21.2445 27.8011 19.7603 27.8699C18.2762 27.9388 17.8019 27.9541 14.0073 27.9541C10.2204 27.9541 9.74612 27.9388 8.25432 27.8699C6.77016 27.8011 5.75268 27.5639 4.86524 27.2197C3.94721 26.8678 3.16688 26.3858 2.39421 25.6131C1.62153 24.8404 1.14721 24.0601 0.787649 23.1421C0.443387 22.2546 0.206228 21.2372 0.137376 19.753C0.0685232 18.2688 0.0532227 17.7945 0.0532227 14C0.0532227 10.2131 0.0685232 9.73879 0.137376 8.24699C0.206228 6.76284 0.443387 5.74535 0.787649 4.85792C1.13956 3.93989 1.62153 3.15956 2.39421 2.38688C3.16688 1.6142 3.94721 1.13989 4.86524 0.780325C5.75268 0.436062 6.77016 0.198904 8.25432 0.130051C9.73847 0.061199 10.2128 0.0458984 14.0073 0.0458984C17.7942 0.0458984 18.2685 0.061199 19.7603 0.130051C21.2445 0.198904 22.262 0.436062 23.1494 0.780325C24.0674 1.13224 24.8478 1.6142 25.6204 2.38688C26.3931 3.15956 26.8674 3.93989 27.227 4.85792ZM24.8861 22.2317C25.0774 21.7421 25.3069 21 25.3681 19.6382L25.3731 19.5186C25.4305 18.1423 25.4522 17.6226 25.4522 14C25.4522 10.2743 25.4369 9.8306 25.3681 8.36175C25.3069 7 25.0774 6.25792 24.8861 5.7683C24.626 5.11803 24.3276 4.65136 23.838 4.16175C23.3484 3.67213 22.8817 3.36612 22.2315 3.11366C21.7418 2.9224 20.9998 2.69289 19.638 2.63169C18.1691 2.56284 17.7254 2.54754 13.9997 2.54754C10.274 2.54754 9.83031 2.56284 8.36145 2.63169C6.99969 2.69289 6.25761 2.9224 5.76799 3.11366C5.11772 3.37377 4.65105 3.67213 4.16143 4.16175C3.67181 4.65136 3.36579 5.11803 3.11333 5.7683C2.92208 6.25792 2.69257 7 2.63137 8.36175C2.56251 9.8306 2.54721 10.2743 2.54721 14C2.54721 17.7257 2.56251 18.1694 2.63137 19.6382C2.69257 21 2.92208 21.7421 3.11333 22.2317C3.37345 22.882 3.67181 23.3486 4.16143 23.8382C4.65105 24.3279 5.11772 24.6339 5.76799 24.8863C6.25761 25.0776 6.99969 25.3071 8.36145 25.3683C9.83031 25.4372 10.274 25.4525 13.9997 25.4525C17.7254 25.4525 18.1691 25.4372 19.638 25.3683C20.9998 25.3071 21.7418 25.0776 22.2315 24.8863C22.8817 24.6262 23.3484 24.3279 23.838 23.8382C24.3276 23.3486 24.6337 22.882 24.8861 22.2317Z"
                                  fill="url(#paint0_linear)"/>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M6.83154 14.0001C6.83154 10.0449 10.037 6.83179 13.9998 6.83179C17.9627 6.83179 21.1682 10.0373 21.1682 14.0001C21.1682 17.9553 17.955 21.1684 13.9998 21.1684C10.0447 21.1684 6.83154 17.9629 6.83154 14.0001ZM9.34848 14.0001C9.34848 16.5706 11.4294 18.6515 13.9998 18.6515C16.5703 18.6515 18.6512 16.5706 18.6512 14.0001C18.6512 11.4296 16.5703 9.34873 13.9998 9.34873C11.4294 9.34873 9.34848 11.4296 9.34848 14.0001Z"
                                  fill="url(#paint1_linear)"/>
                            <circle cx="21.4513" cy="6.5487" r="1.67541" fill="#BC30A0"/>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M0.122239 19.753C0.0533865 18.2688 0.0380859 17.7945 0.0380859 14C0.0380859 10.2055 0.0533865 9.73114 0.122239 8.24699C0.191091 6.76284 0.42825 5.74535 0.772512 4.85792C1.12442 3.93989 1.60639 3.15956 2.37907 2.38688C3.15175 1.6142 3.93208 1.13989 4.85011 0.780325C5.73754 0.436062 6.75503 0.198904 8.23918 0.130051C9.72333 0.061199 10.1976 0.0458984 13.9922 0.0458984C17.7791 0.0458984 18.2534 0.061199 19.7452 0.130051C21.2293 0.198904 22.2468 0.436062 23.1343 0.780325C24.0523 1.13224 24.8326 1.6142 25.6053 2.38688C26.378 3.15956 26.8523 3.93989 27.2119 4.85792C27.5561 5.74535 27.7933 6.76284 27.8621 8.24699C27.931 9.73114 27.9463 10.2055 27.9463 14C27.9463 17.7869 27.931 18.2612 27.8621 19.753C27.7933 21.2372 27.5561 22.2546 27.2119 23.1421C26.8599 24.0601 26.378 24.8404 25.6053 25.6131C24.8326 26.3858 24.0523 26.8601 23.1343 27.2197C22.2468 27.5639 21.2293 27.8011 19.7452 27.8699C18.261 27.9388 17.7867 27.9541 13.9922 27.9541C10.2053 27.9541 9.73098 27.9388 8.23918 27.8699C6.75503 27.8011 5.73754 27.5639 4.85011 27.2197C3.93208 26.8678 3.15175 26.3858 2.37907 25.6131C1.60639 24.8404 1.13207 24.0601 0.772512 23.1421C0.42825 22.2546 0.191091 21.2372 0.122239 19.753ZM2.63918 8.36175C2.57033 9.8306 2.55503 10.2743 2.55503 14C2.55503 17.7257 2.57033 18.1694 2.63918 19.6382C2.70038 21 2.92989 21.7421 3.12115 22.2317C3.38126 22.882 3.67962 23.3486 4.16923 23.8382C4.65885 24.3279 5.12552 24.6339 5.77579 24.8863C6.26541 25.0776 7.00748 25.3071 8.36923 25.3683C9.83809 25.4372 10.2818 25.4525 14.0075 25.4525C17.7332 25.4525 18.1769 25.4372 19.6457 25.3683C21.0075 25.3071 21.7496 25.0776 22.2392 24.8863C22.8895 24.6262 23.3561 24.3279 23.8457 23.8382C24.3354 23.3486 24.6414 22.882 24.8938 22.2317C25.0851 21.7421 25.3146 21 25.3758 19.6382C25.4446 18.1694 25.4599 17.7257 25.4599 14C25.4599 10.2743 25.4446 9.8306 25.3758 8.36175C25.3146 7 25.0851 6.25792 24.8938 5.7683C24.6337 5.11803 24.3354 4.65136 23.8457 4.16175C23.3561 3.67213 22.8895 3.36612 22.2392 3.11366C21.7496 2.9224 21.0075 2.69289 19.6457 2.63169C18.1769 2.56284 17.7332 2.54754 14.0075 2.54754C10.2818 2.54754 9.83809 2.56284 8.36923 2.63169C7.00748 2.69289 6.26541 2.9224 5.77579 3.11366C5.12552 3.37377 4.65885 3.67213 4.16923 4.16175C3.67962 4.65136 3.37361 5.11803 3.12115 5.7683C2.92989 6.25792 2.70038 7 2.63918 8.36175Z"
                                  fill="url(#paint2_linear)"/>
                            <defs>
                                <linearGradient id="paint0_linear" x1="-6.13661" y1="2.37968" x2="3.00793" y2="32.9717"
                                                gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#4367DC"/>
                                    <stop offset="0.0428861" stop-color="#4C62D6"/>
                                    <stop offset="0.1142" stop-color="#6654C7"/>
                                    <stop offset="0.2045" stop-color="#8F3DAE"/>
                                    <stop offset="0.2341" stop-color="#9E35A5"/>
                                    <stop offset="0.4512" stop-color="#D42F7F"/>
                                    <stop offset="0.8242" stop-color="#D73578"/>
                                </linearGradient>
                                <linearGradient id="paint1_linear" x1="11.2573" y1="4.58369" x2="3.92627" y2="16.9097"
                                                gradientUnits="userSpaceOnUse">
                                    <stop offset="0.3304" stop-color="#D42F7F"/>
                                    <stop offset="1" stop-color="#F7772E"/>
                                </linearGradient>
                                <linearGradient id="paint2_linear" x1="5.60635" y1="-7.26946" x2="-6.7396" y2="22.1766"
                                                gradientUnits="userSpaceOnUse">
                                    <stop offset="0.2341" stop-color="#9E35A5" stop-opacity="0.01"/>
                                    <stop offset="0.4512" stop-color="#D42F7F" stop-opacity="0.5"/>
                                    <stop offset="0.7524" stop-color="#F7772E"/>
                                    <stop offset="0.9624" stop-color="#FEF780"/>
                                </linearGradient>
                            </defs>
                        </svg>

                    </a>
                </div>

            </div>
            <div class="b-footer__payment-list">
                <div class="b-footer__payment-item">
                    <svg class="b-footer__payment-item-img b-footer__payment-item-img-visa"   viewBox="0 0 74 24" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <mask id="mask0" mask-type="alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="74"
                              height="24">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M36.6399 0.506094L31.6953 23.6383H25.715L30.6617 0.506094H36.6399ZM61.7972 15.442L64.9449 6.75638L66.7569 15.442H61.7972ZM68.4695 23.6383H74L69.1725 0.506094H64.0689C62.9209 0.506094 61.9531 1.17364 61.5235 2.20255L52.5513 23.6383H58.8286L60.076 20.1823H67.747L68.4695 23.6383ZM52.862 16.0852C52.8888 9.98061 44.4267 9.64358 44.485 6.91581C44.5035 6.08644 45.2928 5.20461 47.0212 4.97866C47.8766 4.86689 50.2395 4.78015 52.9162 6.01341L53.9669 1.10849C52.527 0.585636 50.6766 0.0830078 48.3724 0.0830078C42.4626 0.0830078 38.3022 3.22769 38.269 7.72906C38.2296 11.061 41.2379 12.9175 43.5045 14.0253C45.8331 15.1588 46.6142 15.886 46.6056 16.8998C46.5881 18.4526 44.7474 19.137 43.0265 19.1637C40.0203 19.2107 38.2755 18.3504 36.8852 17.7021L35.8026 22.7712C37.1984 23.4131 39.7774 23.9726 42.452 24C48.7341 24 52.8425 20.8958 52.862 16.0852ZM28.0957 0.506094L18.4075 23.6383H12.087L7.31949 5.17718C7.03 4.04061 6.77888 3.62335 5.89876 3.14541C4.46158 2.36404 2.0881 1.63169 0 1.17672L0.140806 0.506094H10.3161C11.6122 0.506094 12.779 1.36906 13.0733 2.86426L15.5914 16.2504L21.8149 0.506094H28.0957Z"
                                  fill="white"/>
                        </mask>
                        <g mask="url(#mask0)">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M52.862 16.0852C52.878 12.4329 49.8554 10.8451 47.4369 9.57459C45.8131 8.72155 44.4616 8.01158 44.485 6.91581C44.5035 6.08644 45.2928 5.20461 47.0212 4.97866C47.8766 4.86689 50.2395 4.78015 52.9162 6.01341L53.9669 1.10849C52.527 0.585636 50.6766 0.0830078 48.3724 0.0830078C42.4626 0.0830078 38.3022 3.22769 38.269 7.72906C38.2296 11.061 41.2379 12.9175 43.5045 14.0253C45.8331 15.1588 46.6142 15.886 46.6056 16.8998C46.5881 18.4526 44.7474 19.137 43.0265 19.1637C40.1103 19.2093 38.381 18.4011 37.011 17.7608L36.8852 17.7021L35.8026 22.7712C37.1984 23.4131 39.7774 23.9726 42.452 24C48.7341 24 52.8425 20.8958 52.862 16.0852ZM36.6399 0.506094L31.6953 23.6383H25.715L30.6617 0.506094H36.6399ZM61.7972 15.442L64.9449 6.75638L66.7569 15.442H61.7972ZM74 23.6383H68.4695L67.747 20.1823H60.076L58.8286 23.6383H52.5513L61.5235 2.20255C61.9531 1.17364 62.9209 0.506094 64.0689 0.506094H69.1725L74 23.6383ZM18.4075 23.6383L28.0957 0.506094H21.8149L15.5914 16.2504L13.0733 2.86426C12.779 1.36906 11.6122 0.506094 10.3161 0.506094H0.140806L0 1.17672C2.0881 1.63169 4.46158 2.36404 5.89876 3.14541C6.77888 3.62335 7.03 4.04061 7.31949 5.17718L12.087 23.6383H18.4075Z"
                                  fill="url(#paint0_linear)"/>
                        </g>
                        <defs>
                            <linearGradient id="paint0_linear" x1="0" y1="24.0001" x2="74" y2="24.0001"
                                            gradientUnits="userSpaceOnUse">
                                <stop stop-color="#1D1C45"/>
                                <stop offset="1" stop-color="#174489"/>
                            </linearGradient>
                        </defs>
                    </svg>

                </div>
                <div class="b-footer__payment-item">
                    <svg class="b-footer__payment-item-img b-footer__payment-item-img-mastercard"  viewBox="0 0 42 26" fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <rect x="15.3003" y="2.80347" width="11.2949" height="20.2896" fill="#FF5F00"/>
                        <path
                            d="M16.0098 12.9541C16.0098 8.83439 17.9438 5.17241 20.9191 2.80358C18.7334 1.08703 15.9755 0.0456543 12.9543 0.0456543C5.82495 0.0456543 0.0458984 5.81326 0.0458984 12.9541C0.0458984 20.0835 5.8135 25.8626 12.9543 25.8626C15.964 25.8626 18.722 24.8212 20.9191 23.1046C17.9438 20.7701 16.0098 17.0738 16.0098 12.9541Z"
                            fill="#EB001B"/>
                        <path
                            d="M41.8269 12.9541C41.8269 20.0835 36.0592 25.8626 28.9184 25.8626C25.9087 25.8626 23.1508 24.8212 20.9536 23.1046C23.9633 20.7358 25.8629 17.0853 25.8629 12.9541C25.8629 8.83439 23.929 5.17241 20.9536 2.80358C23.1394 1.08703 25.8973 0.0456543 28.9184 0.0456543C36.0592 0.0456543 41.8269 5.84759 41.8269 12.9541Z"
                            fill="#F79E1B"/>
                    </svg>

                </div>
            </div>
        </div>

    </div>
    </div>

</footer>
