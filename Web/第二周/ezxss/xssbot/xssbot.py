# Author:Leon
from __future__ import print_function
import requests
from selenium import webdriver
from selenium.webdriver.chrome.options import Options
import time
import re
import sys
chrome_opt = Options()
chrome_opt.binary_location = '/usr/bin/google-chrome-stable'
chrome_opt.add_argument('--headless')
chrome_opt.add_argument('--disable-gpu')
chrome_opt.add_argument('--window-size=1366,768')
chrome_opt.add_argument("--no-sandbox")
try:
    browser = webdriver.Chrome(
                    executable_path='/var/xssbot/chromedriver', chrome_options=chrome_opt)
    browser.get('http://127.0.0.1/setc00kie.php')
    furl='http://127.0.0.1/?'+sys.argv[1]
    browser.get(furl)
    print(furl)
    #print(browser.page_source)
    time.sleep(2)
    browser.quit()
except:
    browser.quit()
