<?php

print "<!doctype html>\n";
print "<html><head><title>Test Autocomplete</title>";
print '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />';
print '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>';
print '<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.min.js"></script>';
print '<script src="testac.js?' .time(). '"></script>';


print "</head>\n";
print "<body>\n";
print "<form action=\"#\" method=\"POST\">\n";
print "Field: <input type=\"text\" name=\"form-field\" id=\"form-field\"><br />\n";
print "<input type=\"submit\" name=\"submit\">\n";
print "</form>\n";
print "</body></html>\n";