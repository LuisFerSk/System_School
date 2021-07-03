<?php

class Alert
{

	public static function Danger($mesaje)
	{
		return "<p class='alert alert-danger'>$mesaje</p>";
	}

	public static function Success($mesaje)
	{
		return "<p class='alert alert-success'>$mesaje</p>";
	}
}
