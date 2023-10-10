<div class="container-fluid">
	<h3 class="mb-4 text-dark">Profil</h3>
	<div class="mb-3 row">
		<div class="col-lg-4">
			<div class="mb-3 card">
				<div class="text-center shadow card-body">
                    <form wire:submit='save'>
						<a href="" id="myAnchor">
							@if($image)
								<img class="mt-4 mb-3 rounded-circle" src="{{ $image->temporaryUrl() }}" width="160" height="160">
							@else
								<img class="mt-4 mb-3 rounded-circle" src="{{ asset('img/user/'.$user->image.'') }}" width="160" height="160">
							@endif	
						</a>
                        <input type="file" accept="images/*" wire:model="image" class="d-none" id="fileImage" ">
                        <div class="mb-3">
                            <button class="btn btn-primary btn-sm" type="submit">Changer de photo</button>
                        </div>       
                    </form>
				</div>
			</div>
		</div>
		<div class="col-lg-8">
			{{-- Not for know --}}
			<div class="mb-3 row d-none">
				<div class="col">
					<div class="text-white shadow card bg-primary">
						<div class="card-body">
							<div class="mb-2 row">
								<div class="col">
									<p class="m-0">Peformance</p>
									<p class="m-0">
										<strong>65.2%</strong>
									</p>
								</div>
								<div class="col-auto">
									<i class="fas fa-rocket fa-2x"></i>
								</div>
							</div>
							<p class="m-0 text-white-50 small">
								<i class="fas fa-arrow-up"></i>&nbsp;5% since last month
							</p>
						</div>
					</div>
				</div>
				<div class="col">
					<div class="text-white shadow card bg-success">
						<div class="card-body">
							<div class="mb-2 row">
								<div class="col">
									<p class="m-0">Peformance</p>
									<p class="m-0">
										<strong>65.2%</strong>
									</p>
								</div>
								<div class="col-auto">
									<i class="fas fa-rocket fa-2x"></i>
								</div>
							</div>
							<p class="m-0 text-white-50 small">
								<i class="fas fa-arrow-up"></i>&nbsp;5% since last month
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="mb-3 shadow card">
						<div class="py-3 card-header">
							<p class="m-0 text-primary fw-bold">Paramètre utilisateur</p>
						</div>
						<div class="card-body">
							<form wire:submit='updateUser'>
								<div class="row">
									<div class="col">
										<div class="mb-3">
											<label class="form-label" for="email">
												<strong>Email Address</strong>
											</label>
											<input class="form-control @error('email') is-invalid @enderror" type="email" id="email" value="{{ $email }}" wire:model="email">
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
									</div>
								</div>
								<div class="row">
									<div class="col">
										<div class="mb-3">
											<label class="form-label" for="first_name">
												<strong>Nom</strong>
											</label>
											<input class="form-control @error('name') is-invalid @enderror" type="text" id="first_name" value="{{ $name }}" wire:model="name">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
									</div>
									<div class="col">
										<div class="mb-3">
											<label class="form-label" for="last_name">
												<strong>Prénom</strong>
											</label>
											<input class="form-control @error('surname') is-invalid @enderror" type="text" id="last_name" value="{{ $surname }}" wire:model="surname">
                                            @error('surname')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
									</div>
								</div>
								<div class="mb-3">
									<button class="btn btn-primary btn-sm" type="submit">Enregistrer</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>