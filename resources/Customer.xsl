<?xml version="1.0" encoding="UTF-8"?>

<!--
    Namw: Leong Chee Foei
    Group: G6
-->

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>
    <xsl:template match="/">
        
        <html>
            
            <head>
                <title>Flora Flowershop - Customer Profile</title>
                
                <!-- Latest compiled and minified CSS -->
                <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" />

                <!-- Latest compiled and minified JavaScript -->
                <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
            
            </head>
            
            <body class="container">

                <br/>
                <a href="CustomerMainPage.php">Home</a>  
                <br/>
                <h2>Customer Profile</h2>
                <br/>
                <br/>
            
                <table class="table table-striped table-condensed">
                    <tbody>
                        <xsl:for-each select="customers/customer">
                            <tr>
                                <th class="col-sm-4">
                                    <strong>Name</strong>
                                </th>
                                <td class="col-md-2">
                                    <xsl:value-of select="name/fname" />
                                    <xsl:text> </xsl:text> 
                                    <xsl:value-of select="name/lname" />
                                </td>
                            </tr>
                            <tr>
                                <th class="col-sm-4">
                                    <strong>Email</strong>
                                </th>
                                <td class="col-sm-4">
                                    <xsl:value-of select="email" />
                                </td>
                            </tr>
                            <tr>
                                <th class="col-sm-4">
                                    <strong>Phone Number</strong>
                                </th>
                                <td class="col-sm-4">
                                    <xsl:value-of select="phone" />
                                </td>
                            </tr>
                            <tr>
                                <th class="col-sm-4">
                                    <strong>Address</strong>
                                </th>
                                <td class="col-sm-4">
                                    <xsl:value-of select="address" />
                                </td>
                            </tr>
                            <tr>
                                <th class="col-sm-4">
                                    <strong>Customer Type</strong>
                                </th>
                                <td class="col-sm-4">
                                    <xsl:value-of select="@type" />
                                </td>
                            </tr>
                            <xsl:if test="@type = 'Corporate'">
                                <tr>
                                    <th class="col-sm-4">
                                        <strong>Monthly Credit Limit</strong>
                                    </th>
                                    <td class="col-sm-4">
                                        <xsl:value-of select="monthlyCreditLimit" />
                                    </td>
                                </tr>
                            </xsl:if>
                        </xsl:for-each>
                    </tbody>
                </table>
                
                <br/>
                <br/>
             
                <div class="row">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-2">
                        <a href="CustomerUpdateProfile.php">Update Info</a> 
                    </div>
                    <div class="col-sm-2">
                        <a href="CustomerUpdatePassword.php">Change Password</a> 
                    </div>
                    <div class="col-sm-4"></div>
                </div>
            </body>
            
        </html>
        
    </xsl:template>
</xsl:stylesheet>
