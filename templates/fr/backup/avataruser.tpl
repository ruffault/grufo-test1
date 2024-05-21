{literal}
<style>
.User {
	position: fixed;
	top: 1.2rem;
	right: 30rem;
}
.User__avatar {
	width: 2.4rem;
	height: 2.4rem;
	background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg width='24' height='24' xmlns='http://www.w3.org/2000/svg' fill='%232A303B'%3E%3Cpath d='M12 21a9 9 0 110-18 9 9 0 010 18zm0-2.2a6.195 6.195 0 003.146-.85 6.61 6.61 0 002.354-2.17c-.015-.567-.36-1.09-1.034-1.567-.587-.403-1.335-.73-2.244-.984-.821-.224-1.566-.336-2.233-.336s-1.412.112-2.233.336c-.91.253-1.65.581-2.222.984-.675.478-1.02 1-1.034 1.566a6.61 6.61 0 002.354 2.17A6.262 6.262 0 0012 18.8zm0-12.1a2.62 2.62 0 00-1.364.38 2.814 2.814 0 00-1.012 1.03c-.25.432-.374.895-.374 1.387s.125.954.374 1.387c.25.433.587.776 1.012 1.03.425.253.88.38 1.364.38a2.62 2.62 0 001.364-.38 2.814 2.814 0 001.012-1.03c.25-.433.374-.895.374-1.387s-.125-.955-.374-1.387a2.814 2.814 0 00-1.012-1.03A2.62 2.62 0 0012 6.7z' fill-rule='evenodd'/%3E%3C/svg%3E");
	background-position: center;
	background-size: contain;
	background-repeat: no-repeat;
	display: inline-block;
	flex-shrink: 0;
	height: 2rem;
	width: 2rem;
}
.User__arrow {
	position: relative;
	background-repeat: no-repeat;
	align-self: center;
	height: 1.4rem;
	width: 1.4rem;
	margin-left: .4rem;
	background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' width='14' height='14' fill='%23A4A9B4'%3E%3Cpath d='M3.944 4.5L3 5.455 7 9.5l4-4.045-.944-.955L7 7.607z' fill-rule='evenodd'/%3E%3C/svg%3E");
}

</style>
{/literal}
<section class="User">
	<label>☰</label>
	<a href="{$urlsite}index.php?page=myaccount">
		<div class="User__avatar"></div>
		<span class="User__arrow"></span>
		Mon compte
	</a> 
</section>
