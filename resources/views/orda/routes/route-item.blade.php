<div class="route__desc page__description">
        <div class="container">

            <div class="bread-line">
                <ul class="bread-crambs">
                    <li class="breadcrumb-item">
                        <a href="/">						
						@lang('front_main.bread.home')
                         </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="/">						
						@lang('front_main.routes.title')
                       </a>
                    </li>
                    <li>
					@if(isset($item->relCity->name))
                        <span>{{$item->relCity->name}}</span>
					@endif
                    </li>
                </ul>
            </div>

           @if(isset($item->name))
            <div class="section__title--desc">
                <h1 class="section__title">
                    {{$item->name}}
                </h1>
            </div>
           @endif

            <div class="page__gallery">

                <div class="page__gallery--slider">
                    <div class="swiper-wrapper">
	 @if(isset($item->imgphoto) && is_array($item->imgphoto))
     @foreach($item->img_photo as $v)
                  <div class="swiper-slide">
                            <div class="page__gallery--item">
                                <div class="page__gallery--img">
                                   @if(isset($v))
		
            <img src="{{URL::asset($v)}}" alt="">
		@endif
                                </div>
                            </div>
                        </div>
           @endforeach
		   @endif
                     
                     

                    </div>
					
                    <div class="calendar__arrow--block">
                        <div class="calendar__arrow-prev">
                            <svg xmlns="http://www.w3.org/2000/svg" width="43" height="43" viewBox="0 0 43 43"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M3.34243 41.279C3.34243 40.4434 2.67394 39.6078 1.67121 39.6078C0.835606 39.6078 -1.16882e-07 40.2763 -7.3051e-08 41.279C-3.65255e-08 42.1146 0.668485 42.9502 1.67121 42.9502C2.67394 42.9502 3.34243 42.2817 3.34243 41.279ZM21.2244 5.51503C20.0545 7.35337 19.7203 9.52594 19.7203 11.3643C19.7203 13.5369 20.2217 15.7094 20.723 17.2135C21.0573 18.0491 21.2244 18.7176 21.5586 19.0518C12.7012 16.7121 8.35606 21.5587 8.35606 21.5587C8.35606 21.5587 12.7012 26.4052 21.5586 24.0655C21.3915 24.5668 21.0573 25.0682 20.723 25.9038C20.2217 27.4079 19.7203 29.5805 19.7203 31.7531C19.7203 33.7585 20.0545 35.764 21.2244 37.6023C22.3942 39.6078 25.0682 42.7831 30.249 42.7831C31.0846 42.7831 31.753 42.7831 32.7558 42.616C34.427 42.2817 35.4297 41.6132 35.5968 41.6132C36.9338 40.9447 38.1036 39.7749 38.9393 38.2708C41.1118 33.7585 38.605 30.0818 38.605 29.9147C38.605 29.9147 36.9338 27.2408 33.2571 27.0737C30.7503 27.0737 28.5777 28.5778 27.7421 30.5832C27.2408 31.9202 27.4079 32.9229 27.7421 33.7585C28.2435 34.9284 29.5805 35.5969 31.0846 35.5969C31.4188 35.5969 31.9202 35.5969 32.4215 35.4297L32.5887 35.4297C32.7558 35.4297 32.7558 35.4297 32.7558 35.2626C32.7558 35.2626 32.7558 35.2626 32.5887 35.0955L32.4215 35.0955C31.0845 34.7613 30.4161 33.5914 30.4161 32.2544C30.5832 30.9175 31.4188 30.0819 32.7558 30.0819C33.9256 29.9147 34.7612 30.4161 35.4297 31.2517C36.9338 33.2572 36.5996 36.0982 34.7612 37.9366C33.2571 39.4406 30.9174 39.6078 29.7476 39.6078C29.2462 39.6078 28.7449 39.4406 28.7449 39.4406C28.0764 39.2735 27.4079 39.1064 26.9065 38.7722C24.9011 37.7694 23.8983 36.0982 23.397 34.9284C23.0627 34.2599 22.8956 33.4243 22.8956 32.5887C22.8956 27.4079 27.4079 23.2299 32.9229 23.2299C36.9338 23.2299 40.2762 25.4025 42.1146 28.7449C42.1146 28.7449 42.2817 29.0791 42.2817 29.2463C42.4488 29.5805 42.4488 29.7476 42.6159 30.0819L42.6159 21.3916L42.6159 12.7012C42.4488 13.0355 42.4488 13.2026 42.2817 13.5368C42.2817 13.704 42.1146 13.8711 42.1146 14.0382C40.2762 17.3806 37.1009 19.5532 32.9229 19.5532C27.4079 19.5532 22.8956 15.3752 22.8956 10.1944C22.8956 9.3588 23.0627 8.69033 23.397 7.85472C23.8983 6.68487 24.9011 5.18077 26.9065 4.01093C27.4079 3.67668 28.0764 3.50957 28.7449 3.34245C28.7449 3.34245 29.2462 3.17532 29.7476 3.17532C30.9174 3.17532 33.09 3.17532 34.7612 4.84653C36.5996 6.68487 36.9338 9.52593 35.4297 11.5314C34.7612 12.367 33.7585 12.8683 32.7558 12.7012C31.4188 12.5341 30.5832 11.6985 30.4161 10.5287C30.2489 9.1917 31.0845 8.02183 32.4215 7.68759L32.5887 7.68759C32.5887 7.68759 32.7558 7.6876 32.7558 7.52048C32.7558 7.52048 32.7558 7.35335 32.5887 7.35335L32.4215 7.35335C31.9202 7.18623 31.5859 7.18625 31.0846 7.18625C29.5805 7.18625 28.2435 7.85472 27.7421 9.02456C27.4079 9.86017 27.2408 10.8629 27.7421 12.1999C28.5777 14.2053 30.7503 15.8765 33.2571 15.7094C36.7667 15.7094 38.605 12.8684 38.605 12.8684C38.7721 12.7012 41.2789 9.02457 38.9393 4.51229C38.1036 3.0082 36.9338 1.83835 35.5968 1.16987C35.4297 1.00275 34.2599 0.501373 32.7558 0.16713C31.9202 8.82251e-06 31.0846 2.41619e-05 30.2489 2.41985e-05C25.0682 0.167146 22.3942 3.50958 21.2244 5.51503ZM9.86015 28.2435C9.86015 29.0791 9.19166 29.9147 8.18893 29.9147C7.35333 29.9147 6.51772 29.2462 6.51772 28.2435C6.51772 27.4079 7.1862 26.5723 8.18893 26.5723C9.19166 26.5723 9.86015 27.2408 9.86015 28.2435ZM3.34243 28.2435C3.34243 27.4079 2.67394 26.5723 1.67121 26.5723C0.835606 26.5723 -6.8668e-07 27.2408 -6.42849e-07 28.2435C-6.06324e-07 29.0791 0.668485 29.9147 1.67121 29.9147C2.67394 29.7476 3.34243 29.0791 3.34243 28.2435ZM3.34242 21.5587C3.34242 20.7231 2.67394 19.8875 1.67121 19.8875C0.835605 19.8875 -9.78884e-07 20.5559 -9.35054e-07 21.5587C-8.98528e-07 22.3943 0.668484 23.2299 1.67121 23.2299C2.67394 23.2299 3.34242 22.5614 3.34242 21.5587ZM16.545 8.35609C16.545 9.1917 15.8765 10.0273 14.8738 10.0273C14.0382 10.0273 13.2026 9.35882 13.2026 8.35609C13.2026 7.52048 13.8711 6.68488 14.8738 6.68488C15.8765 6.852 16.545 7.52048 16.545 8.35609ZM9.86014 8.35609C9.86014 9.1917 9.19166 10.0273 8.18893 10.0273C7.35333 10.0273 6.51772 9.35882 6.51772 8.35609C6.51772 7.52048 7.1862 6.68488 8.18893 6.68488C9.19166 6.852 9.86014 7.52048 9.86014 8.35609ZM3.34242 8.35609C3.34242 7.52048 2.67394 6.68488 1.67121 6.68488C0.835605 6.68488 -1.55599e-06 7.35336 -1.51216e-06 8.35609C-1.47563e-06 9.1917 0.668484 10.0273 1.67121 10.0273C2.67394 10.0273 3.34242 9.35882 3.34242 8.35609ZM9.86014 15.0409C9.86014 15.8765 9.19166 16.7122 8.18893 16.7122C7.35333 16.7122 6.51772 16.0437 6.51772 15.0409C6.51772 14.2053 7.1862 13.3697 8.18893 13.3697C9.19166 13.3697 9.86014 14.0382 9.86014 15.0409ZM3.34242 15.0409C3.34242 14.2053 2.67394 13.3697 1.67121 13.3697C0.835605 13.3697 -1.26378e-06 14.0382 -1.21995e-06 15.0409C-1.18343e-06 15.8765 0.668484 16.7122 1.67121 16.7122C2.67394 16.545 3.34242 15.8765 3.34242 15.0409ZM13.2026 1.83834C13.2026 1.00274 13.8711 0.167131 14.8738 0.167131C15.7094 0.167131 16.545 0.835616 16.545 1.83834C16.545 2.67395 15.8765 3.50956 14.8738 3.50956C14.0382 3.50956 13.2026 2.67395 13.2026 1.83834ZM6.68485 1.83834C6.68485 1.00274 7.35333 0.167131 8.35606 0.167131C9.19167 0.167131 10.0273 0.835616 10.0273 1.83834C10.0273 2.67395 9.35879 3.50956 8.35606 3.50956C7.35334 3.50956 6.68485 2.67395 6.68485 1.83834ZM3.34242 1.83834C3.34242 1.00274 2.67394 0.167131 1.67121 0.167131C0.835605 0.167131 -1.84089e-06 0.835617 -1.79706e-06 1.83834C-1.76053e-06 2.67395 0.668483 3.50956 1.67121 3.50956C2.67394 3.50956 3.34242 2.67395 3.34242 1.83834ZM16.545 34.7613C16.545 35.5969 15.8765 36.4325 14.8738 36.4325C14.0382 36.4325 13.2026 35.764 13.2026 34.7613C13.2026 33.9257 13.8711 33.09 14.8738 33.09C15.8765 33.09 16.545 33.9257 16.545 34.7613ZM9.86015 34.7613C9.86015 35.5969 9.19166 36.4325 8.18893 36.4325C7.35333 36.4325 6.51772 35.764 6.51772 34.7613C6.51772 33.9257 7.1862 33.09 8.18893 33.09C9.19166 33.09 9.86015 33.9257 9.86015 34.7613ZM3.34243 34.7613C3.34243 33.9257 2.67394 33.09 1.67121 33.09C0.835606 33.09 -4.0178e-07 33.7585 -3.5795e-07 34.7613C-3.21424e-07 35.5969 0.668485 36.4325 1.67121 36.4325C2.67394 36.4325 3.34243 35.5969 3.34243 34.7613ZM16.545 41.279C16.545 42.1146 15.8765 42.9502 14.8738 42.9502C14.0382 42.9502 13.2026 42.2817 13.2026 41.279C13.2026 40.4434 13.8711 39.6078 14.8738 39.6078C15.8765 39.7749 16.545 40.4434 16.545 41.279ZM9.86015 41.279C9.86015 42.1146 9.19166 42.9502 8.18893 42.9502C7.35333 42.9502 6.51772 42.2817 6.51772 41.279C6.51772 40.4434 7.18621 39.6078 8.18893 39.6078C9.19166 39.7749 9.86015 40.4434 9.86015 41.279Z"
                                    fill="#0E4F32" />
                            </svg>
                        </div>
                        <div class="calendar__arrow-next">
                            <svg xmlns="http://www.w3.org/2000/svg" width="44" height="43" viewBox="0 0 44 43"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M39.8894 1.67121C39.8894 2.50682 40.5579 3.34243 41.5607 3.34243C42.3963 3.34243 43.2319 2.67394 43.2319 1.67121C43.2319 0.835607 42.5634 7.9716e-09 41.5607 1.9929e-08C40.5579 3.18864e-08 39.8894 0.668485 39.8894 1.67121ZM22.0075 37.4352C23.1773 35.5968 23.5116 33.4243 23.5116 31.5859C23.5116 29.4133 23.0102 27.2408 22.5088 25.7367C22.1746 24.9011 22.0075 24.2326 21.6732 23.8984C30.5307 26.2381 34.8758 21.3915 34.8758 21.3915C34.8758 21.3915 30.5307 16.545 21.6732 18.8847C21.8404 18.3833 22.1746 17.882 22.5088 17.0464C23.0102 15.5423 23.5116 13.3697 23.5116 11.1971C23.5116 9.19167 23.1773 7.18621 22.0075 5.34788C20.8376 3.34242 18.1637 0.167132 12.9829 0.167132C12.1473 0.167132 11.4788 0.167117 10.4761 0.334238C8.80488 0.668481 7.80216 1.33698 7.63504 1.33698C6.29807 2.00546 5.12822 3.17531 4.29261 4.6794C2.12003 9.19168 4.62685 12.8683 4.62685 13.0355C4.62685 13.0355 6.29807 15.7094 9.97474 15.8765C12.4816 15.8765 14.6541 14.3724 15.4897 12.367C15.9911 11.03 15.824 10.0273 15.4897 9.19167C14.9884 8.02182 13.6514 7.35333 12.1473 7.35333C11.8131 7.35333 11.3117 7.35334 10.8103 7.52046L10.6432 7.52046C10.4761 7.52046 10.4761 7.52047 10.4761 7.68759C10.4761 7.68759 10.4761 7.68758 10.6432 7.8547L10.8103 7.8547C12.1473 8.18894 12.8158 9.35878 12.8158 10.6958C12.6487 12.0327 11.8131 12.8683 10.4761 12.8683C9.30624 13.0355 8.47064 12.5341 7.80215 11.6985C6.29806 9.69304 6.63231 6.85197 8.47065 5.01364C9.97474 3.50955 12.3144 3.34243 13.4843 3.34243C13.9856 3.34243 14.487 3.50956 14.487 3.50956C15.1555 3.67668 15.824 3.84379 16.3253 4.17803C18.3308 5.18076 19.3335 6.85198 19.8349 8.02183C20.1691 8.69031 20.3363 9.52591 20.3363 10.3615C20.3363 15.5423 15.824 19.7203 10.309 19.7203C6.29806 19.7203 2.95564 17.5477 1.11731 14.2053C1.11731 14.2053 0.950188 13.8711 0.950188 13.7039C0.783067 13.3697 0.783058 13.2026 0.615936 12.8683L0.615937 21.5586L0.615937 30.249C0.783058 29.9147 0.783067 29.7476 0.950188 29.4134C0.950188 29.2462 1.11731 29.0791 1.11731 28.912C2.95564 25.5696 6.13094 23.397 10.309 23.397C15.824 23.397 20.3363 27.575 20.3363 32.7558C20.3363 33.5914 20.1691 34.2599 19.8349 35.0955C19.3335 36.2653 18.3308 37.7694 16.3253 38.9393C15.824 39.2735 15.1555 39.4406 14.487 39.6077C14.487 39.6077 13.9856 39.7749 13.4843 39.7749C12.3144 39.7749 10.1419 39.7749 8.47065 38.1037C6.63231 36.2653 6.29806 33.4243 7.80215 31.4188C8.47064 30.5832 9.47337 30.0818 10.4761 30.249C11.8131 30.4161 12.6487 31.2517 12.8158 32.4215C12.9829 33.7585 12.1473 34.9284 10.8103 35.2626L10.6432 35.2626C10.6432 35.2626 10.4761 35.2626 10.4761 35.4297C10.4761 35.4297 10.4761 35.5968 10.6432 35.5968L10.8103 35.5968C11.3117 35.764 11.6459 35.764 12.1473 35.764C13.6514 35.764 14.9884 35.0955 15.4897 33.9256C15.824 33.09 15.9911 32.0873 15.4897 30.7503C14.6541 28.7449 12.4816 27.0737 9.97474 27.2408C6.46519 27.2408 4.62685 30.0818 4.62685 30.0818C4.45973 30.249 1.95291 33.9256 4.29261 38.4379C5.12822 39.942 6.29807 41.1118 7.63504 41.7803C7.80216 41.9474 8.972 42.4488 10.4761 42.7831C11.3117 42.9502 12.1473 42.9502 12.9829 42.9502C18.1637 42.783 20.8376 39.4406 22.0075 37.4352ZM33.3717 14.7067C33.3717 13.8711 34.0402 13.0355 35.0429 13.0355C35.8785 13.0355 36.7141 13.704 36.7141 14.7067C36.7141 15.5423 36.0457 16.3779 35.0429 16.3779C34.0402 16.3779 33.3717 15.7094 33.3717 14.7067ZM39.8894 14.7067C39.8894 15.5423 40.5579 16.3779 41.5607 16.3779C42.3963 16.3779 43.2319 15.7094 43.2319 14.7067C43.2319 13.8711 42.5634 13.0355 41.5607 13.0355C40.5579 13.2026 39.8894 13.8711 39.8894 14.7067ZM39.8894 21.3915C39.8894 22.2271 40.5579 23.0627 41.5607 23.0627C42.3963 23.0627 43.2319 22.3943 43.2319 21.3915C43.2319 20.5559 42.5634 19.7203 41.5607 19.7203C40.5579 19.7203 39.8894 20.3888 39.8894 21.3915ZM26.6869 34.5941C26.6869 33.7585 27.3554 32.9229 28.3581 32.9229C29.1937 32.9229 30.0293 33.5914 30.0293 34.5941C30.0293 35.4297 29.3608 36.2653 28.3581 36.2653C27.3554 36.0982 26.6869 35.4297 26.6869 34.5941ZM33.3717 34.5941C33.3717 33.7585 34.0402 32.9229 35.0429 32.9229C35.8785 32.9229 36.7141 33.5914 36.7141 34.5941C36.7141 35.4297 36.0457 36.2653 35.0429 36.2653C34.0402 36.0982 33.3717 35.4297 33.3717 34.5941ZM39.8894 34.5941C39.8894 35.4297 40.5579 36.2653 41.5607 36.2653C42.3963 36.2653 43.2319 35.5968 43.2319 34.5941C43.2319 33.7585 42.5634 32.9229 41.5607 32.9229C40.5579 32.9229 39.8894 33.5914 39.8894 34.5941ZM33.3717 27.9093C33.3717 27.0736 34.0402 26.238 35.0429 26.238C35.8785 26.238 36.7141 26.9065 36.7141 27.9093C36.7141 28.7449 36.0457 29.5805 35.0429 29.5805C34.0402 29.5805 33.3717 28.912 33.3717 27.9093ZM39.8894 27.9093C39.8894 28.7449 40.5579 29.5805 41.5607 29.5805C42.3963 29.5805 43.2319 28.912 43.2319 27.9093C43.2319 27.0736 42.5634 26.238 41.5607 26.238C40.5579 26.4052 39.8894 27.0736 39.8894 27.9093ZM30.0293 41.1119C30.0293 41.9475 29.3608 42.7831 28.3581 42.7831C27.5225 42.7831 26.6869 42.1146 26.6869 41.1119C26.6869 40.2762 27.3554 39.4406 28.3581 39.4406C29.1937 39.4406 30.0293 40.2762 30.0293 41.1119ZM36.547 41.1119C36.547 41.9475 35.8785 42.7831 34.8758 42.7831C34.0402 42.7831 33.2046 42.1146 33.2046 41.1119C33.2046 40.2762 33.8731 39.4406 34.8758 39.4406C35.8785 39.4406 36.547 40.2762 36.547 41.1119ZM39.8894 41.1119C39.8894 41.9475 40.5579 42.7831 41.5607 42.7831C42.3963 42.7831 43.2319 42.1146 43.2319 41.1119C43.2319 40.2762 42.5634 39.4406 41.5607 39.4406C40.5579 39.4406 39.8894 40.2762 39.8894 41.1119ZM26.6869 8.18893C26.6869 7.35333 27.3554 6.51772 28.3581 6.51772C29.1937 6.51772 30.0293 7.18621 30.0293 8.18893C30.0293 9.02454 29.3608 9.86015 28.3581 9.86015C27.3554 9.86015 26.6869 9.02454 26.6869 8.18893ZM33.3717 8.18893C33.3717 7.35333 34.0402 6.51772 35.0429 6.51772C35.8785 6.51772 36.7141 7.18621 36.7141 8.18893C36.7141 9.02454 36.0457 9.86015 35.0429 9.86015C34.0402 9.86015 33.3717 9.02454 33.3717 8.18893ZM39.8894 8.18893C39.8894 9.02454 40.5579 9.86015 41.5607 9.86015C42.3963 9.86015 43.2319 9.19166 43.2319 8.18893C43.2319 7.35333 42.5634 6.51772 41.5607 6.51772C40.5579 6.51772 39.8894 7.35333 39.8894 8.18893ZM26.6869 1.67121C26.6869 0.835607 27.3554 1.89325e-07 28.3581 1.77368e-07C29.1937 1.67404e-07 30.0293 0.668485 30.0293 1.67121C30.0293 2.50682 29.3608 3.34243 28.3581 3.34243C27.3554 3.1753 26.6869 2.50682 26.6869 1.67121ZM33.3717 1.67121C33.3717 0.835607 34.0402 1.09609e-07 35.0429 9.7652e-08C35.8785 8.76875e-08 36.7141 0.668485 36.7141 1.67121C36.7141 2.50682 36.0457 3.34243 35.0429 3.34243C34.0402 3.1753 33.3717 2.50682 33.3717 1.67121Z"
                                    fill="#0E4F32" />
                            </svg>
                        </div>
                    </div>
					
					
                </div>

            </div>

            <div class="page__description--text">
           @if(isset($item->props_1))

                <div class="page__title-mini">
				{{$item->props_1}}
                </div>
              @endif
                <div class="route__page--list">
                    <div class="sights__list--item">
                        <div class="sights__list--text">
						  @lang('front_main.routes.exhibition')

						    
                        </div>
                    </div>  
           @if(isset($item->relCity->name))

                    <div class="sights__list--item">
                        <div class="sights__list--img">
                            <img src="/img/map-route.svg" alt="">
                        </div>
                        <div class="sights__list--text">
						{{$item->relCity->name}}
                        </div>
                    </div>
			@endif
			 @if(isset($item->props_3))
				 <!------------------один день --------------------->
                    <div class="sights__list--item">
                        <div class="sights__list--img">
                            <img src="/img/data-route.svg" alt="">
                        </div>
                        <div class="sights__list--text">
						{{$item->props_3}} 
                        </div>
                    </div>
              @endif
                </div>

                <div class="about__text">
				@if(isset($item->description))
				{!! $item->description !!}
					@endif
                </div>

<br>
                <div class="route__page--price">
                    @lang('front_main.routes.price') <strong>
					@if($item->group)
					{{$item->group}}
					@endif
							
					@if(isset($item->price))
					{{$item->price}} тнг.
                    @endif
</strong>
                </div>
            </div>



            <div class="way__block">
                <a href="#routemap" class="way__linck">
				@lang('front_main.routes.path')
                     <img src="/img/chevron-right-white.svg" alt="">
                </a>
            </div>

          
            <div class="route__line--block">
                <div class="route__line">
                   @if(isset($item->coords[0]))
					@php
				    $count =-1;
					$size= count($item->coords);
				    @endphp
				    @foreach($item->coords as $v)
					@php
				    $count++;
				    @endphp
                    <div class="route__line--li">
                        <div class="route__line--item 
						{{($size-1) == $count ? 'route__line--active' : ''}}">
                            <div class="route__item--absol">
							
                                <div class="route__item--img">
								@if(($size-1) == $count)
								<img src="/img/bus-4.svg" alt="">
							     @else
								     <img src="/img/bus-1.svg" alt="">
							     @endif
                               
                                </div>
                                <div class="route__item--km" id="route{{$count}}">
                                    0 км
                                </div>
                            </div>
                            <div class="route__item--btn">
                                <a>
                                    @if(isset($v->coord_name))
									{{$v->coord_name}}
								 
                                     @endif
                                </a>
                            </div>
                        </div>
                    </div>
					
					  

					@endforeach
                    @endif
                </div>
				
            </div>


        </div>
    </div>

    <div class="route__line--maps" id="routemap">
        <div id="maps"></div>
    </div>


<script>var json = "{{$php_json}}";</script>



