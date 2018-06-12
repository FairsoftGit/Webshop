<?php
$productId;
$productName;
$salesPrice;
$amount;
?>
{% extends "base.html" %}
{% block title %}Winkelwagen{% endblock %}
{% block pageCss %}
{% endblock %}
{% block body %}
<div class="card content-card">
	<div class="card-header">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="/">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Winkelwagen</li>
			</ol>
		</nav>
	</div>
	<div class="card-body">
		<div class="container-fluid">
			{{cart.test()}}
		</div>
	</div>
</div>
{% endblock %}
{% block pageScript %}
{% endblock %}
