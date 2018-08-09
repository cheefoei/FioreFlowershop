<?xml version="1.0" encoding="UTF-8"?>

<!--
    Document   : Order_XSL.xsl
    Created on : August 2, 2018, 4:17 PM
    Author     : JJzaii
    Description:
        Purpose of transformation follows.
-->

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html"/>

    <!-- TODO customize transformation rules 
         syntax recommendation http://www.w3.org/TR/xslt 
    -->

    <xsl:template match="/">
        <html>
            <head>
                <title>Order_XSL.xsl</title>
            </head>
            <body>
                <h1>Today Pickup Record </h1>
                
                <table border="1">
                    <tr>
                        <th>Order ID</th>
                        <th>Order Date</th>
                        <th>Customer ID</th>
                        <th>Customer Name</th>
                        <th>Pick Up Date</th>
                        <th>Payment(RM)</th>
                        <th>Payment Date</th>
                        <th>Pick Up Time</th>
                        <th>Staff ID</th>
                        
                    </tr>
          
                    <xsl:for-each select="Pick_Up/PICKUP">
                        <tr>
                            <td>
                                <xsl:value-of select="Order_ID" />
                            </td>
                            <td>
                                <xsl:value-of select="orderDate" />
                            </td>
                            <td>
                                <xsl:value-of select="custID" />
                            </td>
                            <td>
                                <xsl:value-of select="custName" />
                            </td>
                            <td>
                                <xsl:value-of select="pickupDate" />
                            </td>
                            <td>
                                <xsl:value-of select="Payment" />
                            </td>
                            <td>
                                <xsl:value-of select="paymentDate" />
                            </td>
                            <td>
                                <xsl:value-of select="payTime" />
                            </td>
                            <td>
                                <xsl:value-of select="staffID" />
                            </td>
                        </tr>
                    </xsl:for-each>
                </table>    
                    <p>
                    Total of Pickup for today is <xsl:value-of select="count(//PICKUP)"/> item(s).
                    <br/>
                     
                    Total amount for today Pickup is RM<xsl:value-of select="sum(//Pick_up[Payment]/Payment)"/>
                    </p>
            </body>
        
        </html>
    </xsl:template>

</xsl:stylesheet>
