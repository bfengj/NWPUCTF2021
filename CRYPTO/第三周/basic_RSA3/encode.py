from Crypto.Util.number import inverse, long_to_bytes, getPrime, bytes_to_long

p = getPrime(1024)
q = getPrime(1024)

print('p=',hex(p).replace('ab','1c').replace('c4','a3').replace('11','df'))
print('q=',hex(q))

flag = bytes_to_long(b'flag{xxxxxxxxxxxx}')
n = p * q
e = 65537
print('n=',hex(n))
print()
print('c=',hex(pow(flag,e,n)))






