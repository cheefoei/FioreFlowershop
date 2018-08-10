<!-- 
Name: Lim Jun Kit
 Group: G6
-->
<?xml version="1.0" encoding="UTF-8"?>

<!--
    Document   : Delivery_XSL.xsl
    Created on : August 2, 2018, 10:55 PM
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
                <title>PICKUP_XSL.xsl</title>
            </head>
            <body>
                <h1>Today PICKUP Record </h1>
                
                <table border="1">
                    <tr>
                        <th>Order ID</th>
                        <th>Order Date</th>
                        <th>Customer ID</th>
                        <th>Customer Name</th>
                        <th>PickUp Date</th>
                        <th>Payment(RM)</th>
                        <th>Payment Date</th>
                        <th>PickUp Time</th>
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
                                <xsl:value-of select="Payment2" />
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
                    Total of Delivery for today is <xsl:value-of select="count(//PICKUP)"/> item(s).
                    <br/>
                    Total amount for today Delivery is RM<xsl:value-of select="sum(//PICKUP[Payment2]/Payment2)"/>
                    <br/>
                </p>
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>
