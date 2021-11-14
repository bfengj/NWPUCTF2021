# DotNET

改编自

[RaRCTF2021-Dotty]: https://github.com/TheWinRaRs/RaRCTF2021-Challenges-Public/tree/main/rev/Dotty	"RaRCTF2021-Dotty"

## Solution
C#反编译，windows下可以用dnspy，linux下可以用ILSpy，反编译得到源码

```C#
private static string generate(string phrase)
		{
			return string.Join(" ", from char c in phrase
				select mapper[char.ToUpper(c)]);
		}

		private static void Main(string[] args)
		{
			Console.Write("Input flag:");
			string phrase = Console.ReadLine();
			string text = generate(phrase);
			if (text == Check.check)
			{
				Console.WriteLine("Congrats!");
			}
			else
			{
				Console.WriteLine(text);
			}
		}
```

根据输入编码，和结果对比

```c#
internal class Check
	{
		public static string check = "- .... . / ..-. .-.. .- --. / .. ... / -- --.. .-- --. -.-. --.. ...-- ...-- --. ...- .-. .-- -.- -.-- --.. .-. --. -.-- ..--- -.. .- .-.. .-.. -.. -- --.- ....- -.. ... .-.. .--- ..- -- .--- .-. - .- .-.. .-.. -.-. -- ...- - --. -- .-.. .--- ... -- ..- --.. - .. --.. .-. ...- .... . -.-- --. . -.-- ...-- -.-. -- --.- .-- - --. -- - --. --. -- --.. - .. -. .-.. . -- --.. .-. -.. .- --.. .-.. ..... / -... .- ... . ...-- ..---";
	}
```

根据已知的结果解出正确的输入应为

```
THE FLAG IS MZWGCZ33GVRWKYZRGY2DALLDMQ4DSLJUMJRTALLCMVTGMLJSMUZTIZRVHEYGEY3CMQWTGMTGGMZTINLEMZRDAZL5 BASE32
```

解base32得到flag

```bash
➜  src echo MZWGCZ33GVRWKYZRGY2DALLDMQ4DSLJUMJRTALLCMVTGMLJSMUZTIZRVHEYGEY3CMQWTGMTGGMZTINLEMZRDAZL5 |base32 -d
flag{5cec1640-cd89-4bc0-beff-2e34f590bcbd-32f3345dfb0e}%
```



