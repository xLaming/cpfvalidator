<?php
/**
 * CPF Validator
 * Classe usada para validação de CPF.
 * MIT License. Copyright (c) 2018 Paulo Rodriguez
 *
 * @author Paulo Rodrigues (xlaming)
 * @link https://paulao.me/cpf/
 * @version 1.0 stable
 */
class CPFValidator
{
	/**
	 * Invalid CPFs
	 * @var array
	 */
	protected $invalidCPF = [00000000000, 11111111111, 22222222222, 33333333333, 44444444444, 55555555555, 66666666666, 77777777777, 88888888888, 99999999999];

	/**
	 * Validating the CPF
	 * @param  string $cpf
	 * @return bool
	 */
	public function validate($cpf)
	{
		if (empty($cpf))
		{
			return false;
		}

		/* remove everything except digits */
		$cpf = preg_replace('/\D/', '', $cpf);
		$cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);

		if (strlen($cpf) != 11) // check if it is 11 digits
		{
			return false;
		}
		else if (in_array($cpf, $this->invalidCPF)) // check if it is in the list of invalid CPFs
		{
			return false;
		}
		else
		{
			for ($t = 9; $t < 11; $t++)
			{
				for ($d = 0, $c = 0; $c < $t; $c++)
				{
					$d += $cpf{$c} * (($t + 1) - $c);
				}
				$d = ((10 * $d) % 11) % 10;
				if ($cpf{$c} != $d) // check if the sum is invalid
				{
					return false;
				}
			}
			return true; // seems that everythings ok
		}
	}
}
?>
