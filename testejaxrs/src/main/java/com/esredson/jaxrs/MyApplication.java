package com.esredson.jaxrs;

import io.swagger.jaxrs.config.BeanConfig;

import java.util.HashSet;
import java.util.Set;

import javax.ws.rs.ApplicationPath;
import javax.ws.rs.core.Application;

@ApplicationPath("rest")
public class MyApplication extends Application {
	
	public MyApplication() {
		BeanConfig beanConfig = new BeanConfig();
        beanConfig.setVersion("0.1");
        beanConfig.setTitle("Título de teste");
        beanConfig.setSchemes(new String[]{"http"});
        beanConfig.setHost("localhost:8080");
        beanConfig.setBasePath("testejaxrs/rest");
        beanConfig.setResourcePackage("com.esredson.jaxrs");
        beanConfig.setScan(true);
	}
	
	@Override
    public Set<Class<?>> getClasses() {
        Set<Class<?>> resources = new HashSet<Class<?>>();
        
        resources.add(MyService.class);
        
        resources.add(io.swagger.jaxrs.listing.ApiListingResource.class);
        resources.add(io.swagger.jaxrs.listing.SwaggerSerializers.class);
        
        return resources;
    }

}
