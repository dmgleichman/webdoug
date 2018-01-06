#!"C:\xampp\perl\bin\perl.exe"
##
##  printenv -- demo CGI program which just prints its environment
##
print "Content-type: text/html\n\n";
print "<html><head><title>PHP Test</title></head>";

print "<body>";
 
print "<h1>Test Perl CGI</h1>";
print "<p>This uses perl to print the environment variables</p>";

print "<pre>";
## use perl to print the environment
foreach $var (sort(keys(%ENV))) {
	$val = $ENV{$var};
	$val =~ s|\n|\\n|g;
	$val =~ s|"|\\"|g;
	print "${var}=\"${val}\"\n";
}

print "	</pre>";

print "<p>End of environment</p>";
print " </body></html>";