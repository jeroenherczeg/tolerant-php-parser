--TEST--
PHP Spec test generated from ./expressions/relational_operators/comparisons2.php
--FILE--
<?php

/*
   +-------------------------------------------------------------+
   | Copyright (c) 2014 Facebook, Inc. (http://www.facebook.com) |
   +-------------------------------------------------------------+
*/

error_reporting(-1);

///*
// Two non-numeric strings

$oper1 = array("", "a", "aa", "a0", "aA");
$oper2 = array("", "ab", "abc", "A", "AB");

foreach ($oper1 as $e1)
{
	foreach ($oper2 as $e2)
	{
		echo "{$e1} >        {$e2}  result: "; var_dump($e1 > $e2);
		echo "{$e2} <=       {$e1}  result: "; var_dump($e2 <= $e1);
		echo "---\n";
		echo "{$e1} >=       {$e2}  result: "; var_dump($e1 >= $e2);
		echo "{$e2} <        {$e1}  result: "; var_dump($e2 < $e1);
		echo "---\n";
		echo "{$e1} <        {$e2}  result: "; var_dump($e1 < $e2);
		echo "{$e2} >=       {$e1}  result: "; var_dump($e2 >= $e1);
		echo "---\n";
		echo "{$e1} <=       {$e2}  result: "; var_dump($e1 <= $e2);
		echo "{$e2} >        {$e1}  result: "; var_dump($e2 > $e1);
		echo "=======\n";
	}
	echo "-------------------------------------\n";
}
--EXPECTF--
>          result: bool(false)
 <=         result: bool(true)
---
 >=         result: bool(true)
 <          result: bool(false)
---
 <          result: bool(false)
 >=         result: bool(true)
---
 <=         result: bool(true)
 >          result: bool(false)
=======
 >        ab  result: bool(false)
ab <=         result: bool(false)
---
 >=       ab  result: bool(false)
ab <          result: bool(false)
---
 <        ab  result: bool(true)
ab >=         result: bool(true)
---
 <=       ab  result: bool(true)
ab >          result: bool(true)
=======
 >        abc  result: bool(false)
abc <=         result: bool(false)
---
 >=       abc  result: bool(false)
abc <          result: bool(false)
---
 <        abc  result: bool(true)
abc >=         result: bool(true)
---
 <=       abc  result: bool(true)
abc >          result: bool(true)
=======
 >        A  result: bool(false)
A <=         result: bool(false)
---
 >=       A  result: bool(false)
A <          result: bool(false)
---
 <        A  result: bool(true)
A >=         result: bool(true)
---
 <=       A  result: bool(true)
A >          result: bool(true)
=======
 >        AB  result: bool(false)
AB <=         result: bool(false)
---
 >=       AB  result: bool(false)
AB <          result: bool(false)
---
 <        AB  result: bool(true)
AB >=         result: bool(true)
---
 <=       AB  result: bool(true)
AB >          result: bool(true)
=======
-------------------------------------
a >          result: bool(true)
 <=       a  result: bool(true)
---
a >=         result: bool(true)
 <        a  result: bool(true)
---
a <          result: bool(false)
 >=       a  result: bool(false)
---
a <=         result: bool(false)
 >        a  result: bool(false)
=======
a >        ab  result: bool(false)
ab <=       a  result: bool(false)
---
a >=       ab  result: bool(false)
ab <        a  result: bool(false)
---
a <        ab  result: bool(true)
ab >=       a  result: bool(true)
---
a <=       ab  result: bool(true)
ab >        a  result: bool(true)
=======
a >        abc  result: bool(false)
abc <=       a  result: bool(false)
---
a >=       abc  result: bool(false)
abc <        a  result: bool(false)
---
a <        abc  result: bool(true)
abc >=       a  result: bool(true)
---
a <=       abc  result: bool(true)
abc >        a  result: bool(true)
=======
a >        A  result: bool(true)
A <=       a  result: bool(true)
---
a >=       A  result: bool(true)
A <        a  result: bool(true)
---
a <        A  result: bool(false)
A >=       a  result: bool(false)
---
a <=       A  result: bool(false)
A >        a  result: bool(false)
=======
a >        AB  result: bool(true)
AB <=       a  result: bool(true)
---
a >=       AB  result: bool(true)
AB <        a  result: bool(true)
---
a <        AB  result: bool(false)
AB >=       a  result: bool(false)
---
a <=       AB  result: bool(false)
AB >        a  result: bool(false)
=======
-------------------------------------
aa >          result: bool(true)
 <=       aa  result: bool(true)
---
aa >=         result: bool(true)
 <        aa  result: bool(true)
---
aa <          result: bool(false)
 >=       aa  result: bool(false)
---
aa <=         result: bool(false)
 >        aa  result: bool(false)
=======
aa >        ab  result: bool(false)
ab <=       aa  result: bool(false)
---
aa >=       ab  result: bool(false)
ab <        aa  result: bool(false)
---
aa <        ab  result: bool(true)
ab >=       aa  result: bool(true)
---
aa <=       ab  result: bool(true)
ab >        aa  result: bool(true)
=======
aa >        abc  result: bool(false)
abc <=       aa  result: bool(false)
---
aa >=       abc  result: bool(false)
abc <        aa  result: bool(false)
---
aa <        abc  result: bool(true)
abc >=       aa  result: bool(true)
---
aa <=       abc  result: bool(true)
abc >        aa  result: bool(true)
=======
aa >        A  result: bool(true)
A <=       aa  result: bool(true)
---
aa >=       A  result: bool(true)
A <        aa  result: bool(true)
---
aa <        A  result: bool(false)
A >=       aa  result: bool(false)
---
aa <=       A  result: bool(false)
A >        aa  result: bool(false)
=======
aa >        AB  result: bool(true)
AB <=       aa  result: bool(true)
---
aa >=       AB  result: bool(true)
AB <        aa  result: bool(true)
---
aa <        AB  result: bool(false)
AB >=       aa  result: bool(false)
---
aa <=       AB  result: bool(false)
AB >        aa  result: bool(false)
=======
-------------------------------------
a0 >          result: bool(true)
 <=       a0  result: bool(true)
---
a0 >=         result: bool(true)
 <        a0  result: bool(true)
---
a0 <          result: bool(false)
 >=       a0  result: bool(false)
---
a0 <=         result: bool(false)
 >        a0  result: bool(false)
=======
a0 >        ab  result: bool(false)
ab <=       a0  result: bool(false)
---
a0 >=       ab  result: bool(false)
ab <        a0  result: bool(false)
---
a0 <        ab  result: bool(true)
ab >=       a0  result: bool(true)
---
a0 <=       ab  result: bool(true)
ab >        a0  result: bool(true)
=======
a0 >        abc  result: bool(false)
abc <=       a0  result: bool(false)
---
a0 >=       abc  result: bool(false)
abc <        a0  result: bool(false)
---
a0 <        abc  result: bool(true)
abc >=       a0  result: bool(true)
---
a0 <=       abc  result: bool(true)
abc >        a0  result: bool(true)
=======
a0 >        A  result: bool(true)
A <=       a0  result: bool(true)
---
a0 >=       A  result: bool(true)
A <        a0  result: bool(true)
---
a0 <        A  result: bool(false)
A >=       a0  result: bool(false)
---
a0 <=       A  result: bool(false)
A >        a0  result: bool(false)
=======
a0 >        AB  result: bool(true)
AB <=       a0  result: bool(true)
---
a0 >=       AB  result: bool(true)
AB <        a0  result: bool(true)
---
a0 <        AB  result: bool(false)
AB >=       a0  result: bool(false)
---
a0 <=       AB  result: bool(false)
AB >        a0  result: bool(false)
=======
-------------------------------------
aA >          result: bool(true)
 <=       aA  result: bool(true)
---
aA >=         result: bool(true)
 <        aA  result: bool(true)
---
aA <          result: bool(false)
 >=       aA  result: bool(false)
---
aA <=         result: bool(false)
 >        aA  result: bool(false)
=======
aA >        ab  result: bool(false)
ab <=       aA  result: bool(false)
---
aA >=       ab  result: bool(false)
ab <        aA  result: bool(false)
---
aA <        ab  result: bool(true)
ab >=       aA  result: bool(true)
---
aA <=       ab  result: bool(true)
ab >        aA  result: bool(true)
=======
aA >        abc  result: bool(false)
abc <=       aA  result: bool(false)
---
aA >=       abc  result: bool(false)
abc <        aA  result: bool(false)
---
aA <        abc  result: bool(true)
abc >=       aA  result: bool(true)
---
aA <=       abc  result: bool(true)
abc >        aA  result: bool(true)
=======
aA >        A  result: bool(true)
A <=       aA  result: bool(true)
---
aA >=       A  result: bool(true)
A <        aA  result: bool(true)
---
aA <        A  result: bool(false)
A >=       aA  result: bool(false)
---
aA <=       A  result: bool(false)
A >        aA  result: bool(false)
=======
aA >        AB  result: bool(true)
AB <=       aA  result: bool(true)
---
aA >=       AB  result: bool(true)
AB <        aA  result: bool(true)
---
aA <        AB  result: bool(false)
AB >=       aA  result: bool(false)
---
aA <=       AB  result: bool(false)
AB >        aA  result: bool(false)
=======
-------------------------------------
