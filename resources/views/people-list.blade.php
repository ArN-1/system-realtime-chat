<div class="row sideBar">
	@foreach($people_list as $people)
	<a href="{{ url('chats/p='.$people->id) }}">
		<div class="row sideBar-body">
			<div class="col-sm-3 col-xs-3 sideBar-avatar">
				<div class="avatar-icon">
					<img src="/image/avatar.png">
				</div>
			</div>
			<div class="col-sm-9 col-xs-9 sideBar-main">
				<div class="row">
					<div class="col-sm-8 col-xs-8 sideBar-name">
						<span class="name-meta">{{ $people->name }}
					</span>
					</div>
					<div class="col-sm-4 col-xs-4 pull-right sideBar-time">
						<span class="time-meta pull-right">18:18
					</span>
					</div>
				</div>
			</div>
		</div>
	</a>
	@endforeach
</div>
