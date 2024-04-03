@extends('adminlte::page')

@section('title', 'Ver Resume')

@section('content')
<!DOCTYPE html>
<html lang="en"> 
<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico"> 
    
    <!-- Google Font -->
    
    
    <!-- FontAwesome JS-->
	<!--<script defer src="Pillar-BS5-v3.0/assets/fontawesome/js/all.min.js"></script>
       
    <!-- Theme CSS -->  
    <!--<link id="theme-style" rel="stylesheet" href="">-->
	@vite(['resources/Pillar-BS5-v3.0/assets/css/pillar-3.css', 'resources/Pillar-BS5-v3.0/assets/fontawesome/js/all.min.js'])


</head> 

<body>	
	@foreach ($resumes as $resume)
    <article class="resume-wrapper text-center position-relative">
	    <div class="resume-wrapper-inner mx-auto text-start bg-white shadow-lg">
		    <header class="resume-header pt-4 pt-md-0">
			    <div class="row">
				    <div class="col-block col-md-auto resume-picture-holder text-center text-md-start">

				        <!--<img class="picture" src="assets/images/profile.jpg" alt="">-->
				    </div><!--//col-->
				    <div class="col">
					    <div class="row p-4 justify-content-center justify-content-md-between">
						    <div class="primary-info col-auto">
							    <h1 class="name mt-0 mb-1 text-white text-uppercase text-uppercase">{{$resume->user->name}}&nbsp;{{$resume->user->lastName}}</h1>
							    <div class="title my-5"></div>
							    <ul class="list-unstyled">
								    <li class="mb-2"><a class="text-link" href="#"><i class="far fa-envelope fa-fw me-2" data-fa-transform="grow-3"></i>{{$resume->user->email}}</a></li>
								    <li><a class="text-link" href="#"><i class="fas fa-mobile-alt fa-fw me-2" data-fa-transform="grow-6"></i>{{$resume->user->phoneNumber}}</a></li>
							    </ul>
						    </div><!--//primary-info-->
						    <!--<div class="secondary-info col-auto mt-2">
							    <ul class="resume-social list-unstyled">
					                <li class="mb-3"><a class="text-link" href="#"><span class="fa-container text-center me-2"><i class="fab fa-linkedin-in fa-fw"></i></span>linkedin.com/in/stevedoe</a></li>
					                <li class="mb-3"><a class="text-link" href="#"><span class="fa-container text-center me-2"><i class="fab fa-github-alt fa-fw"></i></span>github.com/username</a></li>
					                <li class="mb-3"><a class="text-link" href="#"><span class="fa-container text-center me-2"><i class="fab fa-codepen fa-fw"></i></span>codepen.io/username/</a></li>
					                <li><a class="text-link" href="{{route('resume.index')}}"><span class="fa-container text-center me-2"><i class="fas fa-globe"></i></span>CV generado por AbleCareers</a></li>
							    </ul>
						    </div>--><!--//secondary-info-->
					    </div><!--//row-->
					    
				    </div><!--//col-->
			    </div><!--//row-->
		    </header>
		    <div class="resume-body p-5">
			    <section class="resume-section summary-section mb-5">
				    <h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3">INTRODUCCION</h2>
				    <div class="resume-section-content">
					    <p class="mb-0"> {{$resume->info}}</p>
						
					</div>
			    </section><!--//summary-section-->
			    <div class="row">
				    <div class="col-lg-9">
					    <section class="resume-section experience-section mb-5">
						    <h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3">EXPERIENCIA LABORAL</h2>
						    <div class="resume-section-content">
							    <div class="resume-timeline position-relative">
								    <article class="resume-timeline-item position-relative pb-5">
									    
									    <div class="resume-timeline-item-header mb-2">
										    <div class="d-flex flex-column flex-md-row">
										        <h3 class="resume-position-title font-weight-bold mb-1">{{$resume->work_experience}}</h3>
										        <!--<div class="resume-company-name ms-auto">Startup Hub</div>-->
										    </div><!--//row-->
										    <div class="resume-position-time">{{$resume->work_years}}</div>
									    </div><!--//resume-timeline-item-header-->
									    <div class="resume-timeline-item-desc">
										    <p>{{$resume->work_pos}}</p>
										    <!--<h4 class="resume-timeline-item-desc-heading font-weight-bold">Achievements:</h4>
										    <p>Praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident.</p>
										    <ul>
											    <li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>
											    <li>At vero eos et accusamus et iusto odio dignissimos.</li>
											    <li>Blanditiis praesentium voluptatum deleniti atque corrupti.</li>
											    <li>Maecenas tempus tellus eget.</li>
										    </ul>-->
										    <!--<h4 class="resume-timeline-item-desc-heading font-weight-bold">Technologies used:</h4>
										    <ul class="list-inline">
											    <li class="list-inline-item"><span class="badge bg-secondary badge-pill">Angular</span></li>
											    <li class="list-inline-item"><span class="badge bg-secondary badge-pill">Python</span></li>
											    <li class="list-inline-item"><span class="badge bg-secondary badge-pill">jQuery</span></li>
											    <li class="list-inline-item"><span class="badge bg-secondary badge-pill">Webpack</span></li>
											    <li class="list-inline-item"><span class="badge bg-secondary badge-pill">HTML/SASS</span></li>
											    <li class="list-inline-item"><span class="badge bg-secondary badge-pill">PostgresSQL</span></li>
										    </ul>
									    </div>--><!--//resume-timeline-item-desc-->

								    </article><!--//resume-timeline-item-->
								    
								    <article class="resume-timeline-item position-relative pb-5">
									    
									    <div class="resume-timeline-item-header mb-2">
										    <div class="d-flex flex-column flex-md-row">
										        <h3 class="resume-position-title font-weight-bold mb-1">{{$resume->work_two_experience}}</h3>
										        <!--<div class="resume-company-name ms-auto">Google</div>-->
										    </div><!--//row-->
										    <div class="resume-position-time">{{$resume->work_two_years}}</div>
									    </div><!--//resume-timeline-item-header-->
									    <div class="resume-timeline-item-desc">
										    <p>{{$resume->work_two_pos}}</p>
										    <!--<h4 class="resume-timeline-item-desc-heading font-weight-bold">Achievements</h4>
										    <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.</p>
										    <h4 class="resume-timeline-item-desc-heading font-weight-bold">Technologies used:</h4>
										    <ul class="list-inline">
											    <li class="list-inline-item"><span class="badge bg-secondary badge-pill">React</span></li>
											    <li class="list-inline-item"><span class="badge bg-secondary badge-pill">Redux</span></li>
											    <li class="list-inline-item"><span class="badge bg-secondary badge-pill">Django</span></li>
											    <li class="list-inline-item"><span class="badge bg-secondary badge-pill">Webpack</span></li>
											    <li class="list-inline-item"><span class="badge bg-secondary badge-pill">HTML/SASS</span></li>
											    <li class="list-inline-item"><span class="badge bg-secondary badge-pill">MySQL</span></li>
										    </ul>
									    </div>--><!--//resume-timeline-item-desc-->

								    </article><!--//resume-timeline-item-->
								    
  
							    </div><!--//resume-timeline-->
							    
							    

						    </div>
					    </section><!--//experience-section-->

						<section class="resume-section experience-section mb-5">
						    <h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3">ESTUDIOS COMPLEMENTARIOS</h2>
						    <div class="resume-section-content">
							    <div class="resume-timeline position-relative">
								    <article class="resume-timeline-item position-relative pb-5">
									    
									    <div class="resume-timeline-item-header mb-2">
										    <div class="d-flex flex-column flex-md-row">
										        <h3 class="resume-position-title font-weight-bold mb-1">{{$resume->education}}</h3>
										        <!--<div class="resume-company-name ms-auto">Startup Hub</div>-->
										    </div><!--//row-->
										    <div class="resume-position-time">{{$resume->education_years}}</div>
									    </div><!--//resume-timeline-item-header-->
									    <div class="resume-timeline-item-desc">
										    <p>{{$resume->education_pos}}</p>
										    <!--<h4 class="resume-timeline-item-desc-heading font-weight-bold">Achievements:</h4>
										    <p>Praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident.</p>
										    <ul>
											    <li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>
											    <li>At vero eos et accusamus et iusto odio dignissimos.</li>
											    <li>Blanditiis praesentium voluptatum deleniti atque corrupti.</li>
											    <li>Maecenas tempus tellus eget.</li>
										    </ul>-->
										    <!--<h4 class="resume-timeline-item-desc-heading font-weight-bold">Technologies used:</h4>
										    <ul class="list-inline">
											    <li class="list-inline-item"><span class="badge bg-secondary badge-pill">Angular</span></li>
											    <li class="list-inline-item"><span class="badge bg-secondary badge-pill">Python</span></li>
											    <li class="list-inline-item"><span class="badge bg-secondary badge-pill">jQuery</span></li>
											    <li class="list-inline-item"><span class="badge bg-secondary badge-pill">Webpack</span></li>
											    <li class="list-inline-item"><span class="badge bg-secondary badge-pill">HTML/SASS</span></li>
											    <li class="list-inline-item"><span class="badge bg-secondary badge-pill">PostgresSQL</span></li>
										    </ul>
									    </div>--><!--//resume-timeline-item-desc-->

								    </article><!--//resume-timeline-item-->
								    
								    <article class="resume-timeline-item position-relative pb-5">
									    
									    <div class="resume-timeline-item-header mb-2">
										    <div class="d-flex flex-column flex-md-row">
										        <h3 class="resume-position-title font-weight-bold mb-1">{{$resume->education_two}}</h3>
										        <!--<div class="resume-company-name ms-auto">Google</div>-->
										    </div><!--//row-->
										    <div class="resume-position-time">{{$resume->education_two_years}}</div>
									    </div><!--//resume-timeline-item-header-->
									    <div class="resume-timeline-item-desc">
										    <p>{{$resume->education_two_pos}}</p>
										    <!--<h4 class="resume-timeline-item-desc-heading font-weight-bold">Achievements</h4>
										    <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.</p>
										    <h4 class="resume-timeline-item-desc-heading font-weight-bold">Technologies used:</h4>
										    <ul class="list-inline">
											    <li class="list-inline-item"><span class="badge bg-secondary badge-pill">React</span></li>
											    <li class="list-inline-item"><span class="badge bg-secondary badge-pill">Redux</span></li>
											    <li class="list-inline-item"><span class="badge bg-secondary badge-pill">Django</span></li>
											    <li class="list-inline-item"><span class="badge bg-secondary badge-pill">Webpack</span></li>
											    <li class="list-inline-item"><span class="badge bg-secondary badge-pill">HTML/SASS</span></li>
											    <li class="list-inline-item"><span class="badge bg-secondary badge-pill">MySQL</span></li>
										    </ul>
									    </div>--><!--//resume-timeline-item-desc-->

								    </article><!--//resume-timeline-item-->
								    
								    
							    </div><!--//resume-timeline-->

						    </div>
					    </section>
				    </div>

				    <div class="col-lg-3">
					    <!--<section class="resume-section skills-section mb-5">
						    <h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3">Skills &amp; Tools</h2>
						    <div class="resume-section-content">
						        <div class="resume-skill-item">
							        <h4 class="resume-skills-cat font-weight-bold">Frontend</h4>
							        <ul class="list-unstyled mb-4">
								        <li class="mb-2">
								            <div class="resume-skill-name">Angular</div>
									        <div class="progress resume-progress">
											    <div class="progress-bar theme-progress-bar-dark" role="progressbar" style="width: 98%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
								        </li>
								        <li class="mb-2">
								            <div class="resume-skill-name">React</div>
									        <div class="progress resume-progress">
											    <div class="progress-bar theme-progress-bar-dark" role="progressbar" style="width: 94%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
								        </li>
								        <li class="mb-2">
								            <div class="resume-skill-name">JavaScript</div>
									        <div class="progress resume-progress">
											    <div class="progress-bar theme-progress-bar-dark" role="progressbar" style="width: 96%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
								        </li>
								        
								        <li class="mb-2">
								            <div class="resume-skill-name">Node.js</div>
									        <div class="progress resume-progress">
											    <div class="progress-bar theme-progress-bar-dark" role="progressbar" style="width: 92%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
								        </li>
								        <li class="mb-2">
								            <div class="resume-skill-name">HTML/CSS/SASS/LESS</div>
									        <div class="progress resume-progress">
											    <div class="progress-bar theme-progress-bar-dark" role="progressbar" style="width: 96%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
								        </li>
							        </ul>
						        </div><!--//resume-skill-item-->
						        
						        <!--<div class="resume-skill-item">
						            <h4 class="resume-skills-cat font-weight-bold">Backend</h4>
							        <ul class="list-unstyled">
								        <li class="mb-2">
								            <div class="resume-skill-name">Python/Django</div>
									        <div class="progress resume-progress">
											    <div class="progress-bar theme-progress-bar-dark" role="progressbar" style="width: 95%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
								        </li>
								        <li class="mb-2">
								            <div class="resume-skill-name">Ruby/Rails</div>
									        <div class="progress resume-progress">
											    <div class="progress-bar theme-progress-bar-dark" role="progressbar" style="width: 92%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
								        </li>
								        <li class="mb-2">
								            <div class="resume-skill-name">PHP</div>
									        <div class="progress resume-progress">
											    <div class="progress-bar theme-progress-bar-dark" role="progressbar" style="width: 86%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
								        </li>
								        <li class="mb-2">
								            <div class="resume-skill-name">WordPress/Shopify</div>
									        <div class="progress resume-progress">
											    <div class="progress-bar theme-progress-bar-dark" role="progressbar" style="width: 82%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
											</div>
								        </li>
							        </ul>
						        </div><!--//resume-skill-item-->
						        
						        <!--<div class="resume-skill-item">
						            <h4 class="resume-skills-cat font-weight-bold">Others</h4>
						            <ul class="list-inline">
							            <li class="list-inline-item"><span class="badge badge-light">DevOps</span></li>
							            <li class="list-inline-item"><span class="badge badge-light">Code Review</span></li>
							            <li class="list-inline-item"><span class="badge badge-light">Git</span></li>
							            <li class="list-inline-item"><span class="badge badge-light">Unit Testing</span></li>
							            <li class="list-inline-item"><span class="badge badge-light">Wireframing</span></li>
							            <li class="list-inline-item"><span class="badge badge-light">Sketch</span></li>
							            <li class="list-inline-item"><span class="badge badge-light">Balsamiq</span></li>
							            <li class="list-inline-item"><span class="badge badge-light">WordPress</span></li>
							            <li class="list-inline-item"><span class="badge badge-light">Shopify</span></li>
						            </ul>
						        </div><!--//resume-skill-item-->
					<!--</div><!--resume-section-content-->
					    <!--</section><!--//skills-section-->
						<section class="resume-section reference-section mb-5">
						    <h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3">Información Adicional</h2>
						    <div class="resume-section-content">
							    <ul class="list-unstyled resume-awards-list">
								    <li class="mb-2 ps-4 position-relative">
								        <i class="resume-award-icon fas fa-trophy position-absolute" data-fa-transform="shrink-2"></i>
								        <div class="resume-award-name">{{$resume->extra}}</div>
								        <!--<div class="resume-award-desc">{{$resume->extra}}</div>
								    </li>
								    <li class="mb-0 ps-4 position-relative">
								        <i class="resume-award-icon fas fa-trophy position-absolute" data-fa-transform="shrink-2"></i>
								        <div class="resume-award-name">Award Name Ipsum</div>
								        <div class="resume-award-desc">Award desc goes here, ultricies nec, pellentesque.</div>
								    </li>-->
							    </ul>
						    </div>
					    </section><!--//interests-section-->

					    <section class="resume-section education-section mb-5">
						    <h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3">Referencias Personales</h2>
						    <div class="resume-section-content">
							    <ul class="list-unstyled">
								    <li class="mb-2">
								        <div class="resume-degree font-weight-bold">{{$resume->reference}}</div>
								        <div class="resume-degree-org">{{$resume->reference_num}}</div>
								        <!--<div class="resume-degree-time">2013 - 2014</div> --><br>
								    </li>
								    <li>
								        <div class="resume-degree font-weight-bold">{{$resume->reference_two}}</div>
								        <div class="resume-degree-org">{{$resume->reference_two_num}}</div>
								        <!--<div class="resume-degree-time">2010 - 2013</div>-->
								    </li>
							    </ul>
						    </div>
					    </section><!--//education-section-->
					    
					    <!--<section class="resume-section language-section mb-5">
						    <h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3">Language</h2>
						    <div class="resume-section-content">
							    <ul class="list-unstyled resume-lang-list">
								    <li class="mb-2"><span class="resume-lang-name font-weight-bold">English</span> <small class="text-muted font-weight-normal">(Native)</small></li>
								    <li class="mb-2 align-middle"><span class="resume-lang-name font-weight-bold">French</span> <small class="text-muted font-weight-normal">(Professional)</small></li>
								    <li><span class="resume-lang-name font-weight-bold">Spanish</span> <small class="text-muted font-weight-normal">(Professional)</small></li>
							    </ul>
						    </div>
					    </section><!--//language-section-->
					    <!--<section class="resume-section interests-section mb-5">
						    <h2 class="resume-section-title text-uppercase font-weight-bold pb-3 mb-3">Interests</h2>
						    <div class="resume-section-content">
							    <ul class="list-unstyled">
								    <li class="mb-1">Climbing</li>
								    <li class="mb-1">Snowboarding</li>
								    <li class="mb-1">Cooking</li>
							    </ul>
						    </div>
					    </section><!--//interests-section-->
					    
				    </div>
			    </div><!--//row-->
		    </div><!--//resume-body-->
		    
		    
	    </div>
    </article> 
	@endforeach
</body>
</html> 
@endsection