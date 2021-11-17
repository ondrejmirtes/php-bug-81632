<?php declare(strict_types = 1);

function dumpTokens(array $tokens)
{
	var_export(array_map(function ($token) {
		if (is_string($token)) {
			return $token;
		}

		return [token_name($token[0]), $token[1], $token[2]];
	}, $tokens));
}

$tokens = token_get_all(file_get_contents(__DIR__ . '/DumpTypeRule.php'), TOKEN_PARSE);

dumpTokens($tokens);

if ($tokens[0][0] !== T_OPEN_TAG) {
	exit(1);
}

if ($tokens[1][0] !== T_DECLARE) {
	exit(1);
}

if ($tokens[2] !== '(') {
	exit(1);
}

echo "OK\n";
exit(0);
